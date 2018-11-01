<?php


namespace App\Controller;


use App\Service\BookService;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class BookController
 * @Route("/books")
 */
class BookController extends FOSRestController
{
    /**
     * @Route("/list")
     * @param BookService $bookService
     *
     * @return View
     */
    public function index(BookService $bookService): View
    {
        $books= $bookService->setReturnQuery(false)->getAll();
        return View::create($books, Response::HTTP_OK);

    }
}