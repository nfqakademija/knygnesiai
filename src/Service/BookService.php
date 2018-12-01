<?php

namespace App\Service;

use App\Entity\Book\Book;
use App\Entity\Category\Category;
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
     * @param Category $category
     *
     * @return mixed
     */
    public function getBooksByCategory($category)
    {
        return $this->repository->findBooksByCategory($category);
    }
}