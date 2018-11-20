<?php

namespace App\Repository;

use App\Entity\Book\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Book::class);
    }

    /**
     * @return QueryBuilder
     */
    public function createAll(): QueryBuilder
    {
        $qb = $this->createQueryBuilder('b');
        $qb
            ->leftJoin('b.category', 'c');

        return $qb;
    }
    /**
     * @return Book[]
     */
    public function getBooks(string $str = null, $category = 0): array
    {
        $qb = $this->createQueryBuilder('b');
        if (isset($str)) {
            $qb->where('b.title like :param')
               ->setParameter('param', $str . '%');
        }
        if ($category != 0) {
            $qb->where('b.category = :category')
               ->setParameter('category', $category);
        }
        
        $query = $qb->getQuery();
        return $query->getResult();
    }
}