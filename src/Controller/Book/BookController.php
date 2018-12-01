<?php

namespace App\Controller\Book;

use App\Service\BookService;
use App\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

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

        return $this->render('book/index.html.twig', [
            'books' => $books,
            'categories' => $categories,
        ]);
    }
}
