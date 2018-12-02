<?php

namespace App\Controller\Book;

use App\Entity\Book\Book;
use App\Form\BookType;
use App\Service\BookService;
use App\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\RouterInterface;

/**
 * Class BookController
 */
class BookController extends Controller
{
    /**
     * @Route("/books")
     * @param BookService     $bookService
     *
     * @param CategoryService $categoryService
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(BookService $bookService, CategoryService $categoryService)
    {
        $books = $bookService->setReturnQuery(false)->getAll();
        $categories = $categoryService->setReturnQuery(false)->getAll();

        return $this->render(
            'book/index.html.twig',
            [
                'books' => $books,
                'categories' => $categories,
            ]
        );
    }

    /**
     * @Route("/book/{id}")
     *
     *
     * @param Book $book
     *
     * @return JsonResponse
     */
    public function show(Book $book)
    {
        return new JsonResponse(
            [
                'template' => $this->renderView(
                    'book/show.html.twig',
                    [
                        'book' => $book,
                    ]
                ),
            ]
        );
    }

    /**
     * @Route("/books/create")
     *
     * @param Request           $request
     *
     * @param BookService       $bookService
     * @param FlashBagInterface $flashBag
     *
     * @param RouterInterface   $router
     *
     * @param CategoryService   $categoryService
     *
     * @return Response
     * @throws \Exception
     */
    public function create(
        Request $request,
        BookService $bookService,
        FlashBagInterface $flashBag,
        RouterInterface $router,
        CategoryService $categoryService
    ): Response {

        $categories = $categoryService->setReturnQuery(false)->getAll();
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $bookService->create($book);
            $flashBag->add('success', ('Book success'));

            return new RedirectResponse($router->generate('app_wishlist_wishlist_create', ['id' => $book->getId()]));
        }

        return $this->render(
            'book/create.html.twig',
            [
                'book' => $book,
                'form' => $form->createView(),
                'categories' => $categories,
            ]
        );
    }
}
