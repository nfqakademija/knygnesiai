<?php

namespace App\Controller\Book;

use App\Service\BookService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends Controller
{
    /**
     * @Route("/books")
     * @param BookService $bookService
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(BookService $bookService)
    {
        $books = $bookService->setReturnQuery(false)->getAll();


        return $this->render('book/index.html.twig', [
            'books' => $books,
        ]);
    }
}
