<?php


namespace App\Controller\ControllerApi;


use App\Service\BookService;
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
     * @param BookService $bookService
     *
     * @return JsonResponse
     */
    public function index(BookService $bookService)
    {
        $books = $bookService->setReturnQuery(false)->getAll();
        foreach ($books as $book) {
            $_book['id'] = $book->getId();
            $_book['title'] = $book->getTitle();
            $_book['description'] = $book->getDescription();
            $_book['author'] = $book->getAuthor();
            $_book['yearPublication'] = $book->getYearPublication();
            $_book['pageCount'] = $book->getPageCount();
            $_book['status'] = $book->getStatus();
            $_book['likeCount'] = $book->getCountLike();
            $_book['category'] = $book->getCategory()->getName();
            $_book['createdAt'] = $book->getCreatedAt();
            $_book['updatedAt'] = $book->getUpdatedAt();
            $_book['media'] = $book->getMedia()->getFileName();
            $_books[] = $_book;
        }

        return new JsonResponse($_books, 200);
    }

}