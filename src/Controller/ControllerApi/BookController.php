<?php


namespace App\Controller\ControllerApi;


use App\Service\BookService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Book\Book;


/**
 * Class BookController
 */
class BookController extends Controller
{
    /**
     * @Route("/api/books")
     *
     * @param BookService $bookService
     *
     * @return JsonResponse
     */
    public function index(BookService $bookService)
    {
        $request = Request::createFromGlobals();
        $queryString = $request->query->get('q');
        $category = $request->query->get('category');

        $books = $this->getDoctrine()
          ->getRepository(Book::class)
          ->getBooks($queryString, $category);

        return new JsonResponse($books, 200);
    }

    /**
     * @Route("/api/books/{id}", requirements={"id"="\d+"})
     *
     * @return JsonResponse
     */
    public function getById(BookService $bookService, int $id) {
        $book = $this->getDoctrine()
           ->getRepository("App\Entity\Book\Book")
           ->find($id);
        $response = $bookService->getJSONdata($book);
        return new JsonResponse($response, 200);
    }
}
