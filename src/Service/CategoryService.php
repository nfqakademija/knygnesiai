<?php

namespace App\Service;

use App\Entity\Category\Category;
use App\Service\Traits\RepositoryResultsTrait;
use Doctrine\ORM\QueryBuilder;

/**
 * Class CategoryService
 * @package App\Service
 */
class CategoryService extends BaseService
{
    use RepositoryResultsTrait;

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return Category::class;
    }

    /**
     * @return Category[]|array|QueryBuilder
     * @throws \Doctrine\ORM\ORMException
     */
    public function getAll()
    {
        return $this->getResult($this->repository->createAll());
    }

}