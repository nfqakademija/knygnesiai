<?php

namespace App\Controller\Book;

use App\Entity\Book\Book;
use App\Service\BookService;
use App\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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
}
