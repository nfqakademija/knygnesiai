<?php


namespace App\Controller\ControllerApi;


use App\Service\BookService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;



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
          ->getRepository("App\Entity\Book\Book")
          ->getBooks($queryString, $category);
        
        $response = [];
        
        foreach($books as $bookData) {
            $bookObj = $bookService->getJSONdata($bookData);
            array_push($response, $bookObj);
        }
        return new JsonResponse($response, 200);
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