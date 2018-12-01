<?php


namespace App\Controller\Category;


use App\Service\BookService;
use App\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryController
 */
class CategoryController extends Controller
{

    /**
     * @Route("/category")
     * @param BookService     $bookService
     * @param CategoryService $categoryService
     * @param Request         $request
     *
     * @return mixed
     */
    public function index(BookService $bookService, CategoryService $categoryService, Request $request)
    {
        $books = $bookService->setReturnQuery(false)->getBooksByCategory($request->query->get('id'));
        $categories = $categoryService->setReturnQuery(false)->getAll();

        return $this->render(
            'book/index.html.twig',
            [
                'books' => $books,
                'categories' => $categories,
            ]
        );
    }

}