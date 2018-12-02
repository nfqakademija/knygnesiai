<?php

namespace App\Controller\WishList;

use App\Entity\Book\Book;
use App\Entity\Category\Category;
use App\Entity\WishList\WishList;
use App\Form\WishListType;
use App\Service\CategoryService;
use App\Service\WishListService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class WishListController extends AbstractController
{
    /**
     * @Route("/wish/list/book/{id}")
     * @param WishListService      $wishListService
     * @param Request              $request
     * @param FlashBagInterface    $flashBag
     * @param RouterInterface      $router
     * @param CategoryService      $categoryService
     *
     * @param FormFactoryInterface $formFactory
     * @param Book                 $book
     *
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function create(
        WishListService $wishListService,
        Request $request,
        FlashBagInterface $flashBag,
        RouterInterface $router,
        CategoryService $categoryService,
        FormFactoryInterface $formFactory,
        Book $book

    ) {
        $categories = $categoryService->setReturnQuery(false)->getAll();
        $wishList = new WishList();
        $form = $formFactory->create(WishListType::class, $wishList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $wishListCategories = ($request->get('wish_list')['category']);
            for ($i = 0; $i < count($wishListCategories); $i++) {
                $wishList = new WishList();
                $category = $categoryService->getWishListsByCategory(intval($wishListCategories[$i]));
                $wishList->setCategory($category);
                $wishList->setBook($book);
                $wishListService->create($wishList);
            }

            $flashBag->add('success', ('Book success'));

            return new RedirectResponse($router->generate('app_book_book_index'));
        }

        return $this->render(
            'wish_list/create.html.twig',
            [
                'wishList' => $wishList,
                'form' => $form->createView(),
                'categories' => $categories,
            ]
        );


    }
}
