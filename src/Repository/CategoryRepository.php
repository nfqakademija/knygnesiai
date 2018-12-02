<?php

namespace App\Repository;

use App\Entity\Category\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository
{
    /**
     * CategoryRepository constructor.
     *
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Category::class);
    }

    /**
     * @return QueryBuilder
     */
    public function createAll(): QueryBuilder
    {
        $qb = $this->createQueryBuilder('c');

        return $qb;
    }

    /**
     * @param $category
     *
     * @return mixed
     */
    public function findWishListByCategory(int $category)
    {
        $qb = $this->createQueryBuilder('c');
        $qb
            ->where('c = :category')
            ->setParameter('category', $category);

        return $qb->getQuery()->getOneOrNullResult();
    }

}