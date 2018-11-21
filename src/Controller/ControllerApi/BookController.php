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
    public function index(Request $request, BookService $bookService)
    {
        $title = $request->query->get('title');
        $category = $request->query->get('category');

        $books = $this->getDoctrine()
            ->getRepository("App\Entity\Book\Book")
            ->getBooks($title, $category);
        
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

    /**
     * @Route("/api/titles")
     * 
     * @return JsonResponse
     */
     public function getTitles(Request $request) {
        $searchStr = $request->query->get('q');
        $titles = $this->getDoctrine()
            ->getRepository("App\Entity\Book\Book")
            ->getTitles($searchStr);
        
        return new JsonResponse($titles, 200);
     }
}