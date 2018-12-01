<?php

namespace App\Entity\WishList;

use App\Entity\Book\Book;
use App\Entity\Category\Category;
use App\Entity\Traits\WithCreatedAt;
use App\Entity\Traits\WithUpdatedAt;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WishListRepository")
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class WishList
{
    use WithCreatedAt;
    use WithUpdatedAt;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Book
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Book\Book", inversedBy="wishLists")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $book;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Category\Category")
     */
    private $category;


    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    /**
     * @return Book
     */
    public function getBook(): Book
    {
        return $this->book;
    }

    /**
     * @param Book $book
     */
    public function setBook(Book $book): void
    {
        $this->book = $book;
    }
}
