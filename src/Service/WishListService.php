<?php

namespace App\Service;


use App\Entity\WishList\WishList;
use App\Service\Traits\RepositoryResultsTrait;
use Doctrine\ORM\QueryBuilder;

/**
 * Class WishListService
 */
class WishListService extends BaseService
{
    use RepositoryResultsTrait;

    /**
     * @return string
     */
    public function getEntityClass(): string
    {
        return WishList::class;
    }

    /**
     * @return WishList[]|array|QueryBuilder
     * @throws \Doctrine\ORM\ORMException
     */
    public function getAll()
    {
        return $this->getResult($this->repository->createAll());
    }

}