<?php


namespace App\Controller\ControllerApi;


use App\Service\BookService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File; 

use App\Entity\Book\Book;
use App\Form\Form;
use App\Entity\Media\Media;
use App\Entity\Category\Category;



/**
 * Class BookController
 */
class BookController extends Controller
{
    /**
     * @Route("/api/books", methods={"GET"})
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
            ->getRepository(Book::class)
            ->getBooks($title, $category);
      
        return new JsonResponse($books, 200);
    }
    
    /**
     * @Route("/api/books/{id}", requirements={"id"="\d+"})
     *
     * @return JsonResponse
     */
    public function getById(BookService $bookService, int $id) {
        $book = $this->getDoctrine()
           ->getRepository(Book::class)
           ->find($id);
        
           return new JsonResponse($book, 200);
    }

    /**
     * @Route("/api/books", methods = {"POST"})
     * 
     * @return JsonResponse
     */

    public function upload(Request $request) {
        $manager = $this->getDoctrine()->getManager();
        $bookData = [];
        $content = json_decode($request->getContent());

        foreach($content as $key => $value) {
            $bookData[$key] = $value;
            //find category by id
            if ($key == 'category') {
                $category = $this
                ->getDoctrine()
                ->getRepository(Category::class)
                ->find($value);
            }
        }
        
        //create book object
        $book = (new Book())
            ->setTitle($bookData['title'])
            ->setDescription($bookData['description'])
            ->setAuthor($bookData['author'])
            ->setCondition($bookData['condition'])
            ->setYearPublication((int)$bookData['yearPublication'])
            ->setPageCount((int)$bookData['pageCount'])
            ->setImageName($bookData['imageName'])
            ->setCategory($category);


        $manager->persist($book);
        $manager->persist($category);
        $manager->flush();

        return new JsonResponse($book, 200);
    }

    /**
     * @Route("/api/titles")
     * 
     * @return JsonResponse
     */
     public function getTitles(Request $request) {
        $searchStr = $request->query->get('q');
        $titles = $this->getDoctrine()
            ->getRepository(Book::class)
            ->getTitles($searchStr);
        
        return new JsonResponse($titles, 200);
     }
}