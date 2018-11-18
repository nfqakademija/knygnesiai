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
        if (!isset($queryString)) {
            $queryString = "";
        }
        $books = $bookService->setReturnQuery(false)->getAll();
        $bookArray = [];
        $length = count($books);
        for ($i = 0; $i < $length; $i++) {
            $book = [];
            $title = $books[$i]->getTitle();
            if (strlen($queryString) < 1 || stripos($title, $queryString) === 0) {
                $book = $this->insertData($book, $books[$i]);
                array_push($bookArray, $book);
            }
        }
        return new JsonResponse($bookArray, 200);
    }
    
    /**
     * @Route("/api/books/{id}", requirements={"id"="\d+"})
     *
     * @return JsonResponse
     */
    public function getById($id) {
        $book = $this->getDoctrine()
           ->getRepository("App\Entity\Book\Book")
           ->find($id);
        $response = $this->insertData(array(), $book);
        return new JsonResponse($response, 200);
    }

    /**
     * @Route("/api/books/categories/{categoryId}")
     * 
     * @return JsonResponse
     */
    public function getByCategory($categoryId){

        $books = $this->getDoctrine()
        ->getRepository("App\Entity\Book\Book")
        ->findByCategory($categoryId);
        $response = array();
        $bookObj = array();
        foreach($books as $bookData) {
            $bookObj = $this->insertData($bookObj, $bookData);
            array_push($response, $bookObj);
        }
        return new JsonResponse($response, 200);
    }

    //utility function
    public function insertData($emptyArray, $data) {
        $emptyArray['id'] = $data->getId();
        $emptyArray['title'] = $data->getTitle();
        $emptyArray['description'] = $data->getDescription();
        $emptyArray['author'] = $data->getAuthor();
        $emptyArray['yearPublication'] = $data->getYearPublication();
        $emptyArray['pageCount'] = $data->getPageCount();
        $emptyArray['status'] = $data->getStatus();
        $emptyArray['likeCount'] = $data->getLikeCount();
        $emptyArray['category'] = $data->getCategory()->getName();
        $emptyArray['createdAt'] = $data->getCreatedAt();
        $emptyArray['updatedAt'] = $data->getUpdatedAt();
        $emptyArray['media'] = $data->getMedia()->getFileName();
        return $emptyArray;
    }

}