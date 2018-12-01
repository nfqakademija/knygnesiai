<?php

namespace App\Repository;

use App\Entity\WishList\WishList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method WishList|null find($id, $lockMode = null, $lockVersion = null)
 * @method WishList|null findOneBy(array $criteria, array $orderBy = null)
 * @method WishList[]    findAll()
 * @method WishList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WishListRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, WishList::class);
    }
}
