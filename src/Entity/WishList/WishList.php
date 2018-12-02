<?php

namespace App\Entity\WishList;

use App\Entity\Book\Book;
use App\Entity\Category\Category;
use App\Entity\Traits\WithCreatedAt;
use App\Entity\Traits\WithUpdatedAt;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="App\Repository\WishListRepository")
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
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     *
     * @return $this
     */
    public function setCategory(Category $category): WishList
    {
        $this->category = $category;

        return $this;
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
     *
     * @return $this
     */
    public function setBook(Book $book): WishList
    {
        $this->book = $book;

        return $this;
    }
}
