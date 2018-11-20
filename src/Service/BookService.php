<?php

namespace App\Service;

use App\Entity\Book\Book;
use App\Service\Traits\RepositoryResultsTrait;
use Doctrine\ORM\QueryBuilder;

/**
 * Class BookService
 */
class BookService extends BaseService
{
    use RepositoryResultsTrait;

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Book::class;
    }

    /**
     * @return Book[]|array|QueryBuilder
     * @throws \Doctrine\ORM\ORMException
     */
    public function getAll()
    {
        return $this->getResult($this->repository->createAll());
    }

    /**
     * @return array
     */
    public function getJSONdata($data) {
        $emptyArray = array();
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