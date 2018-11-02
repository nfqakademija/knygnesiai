<?php


namespace App\Controller\ControllerApi;


use App\Service\BookService;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;



/**
 * Class BookController
 */
class BookController extends FOSRestController
{
    /**
     * @Rest\Get("/books")
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