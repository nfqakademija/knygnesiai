<?php

namespace App\Entity\Book;

use App\Entity\Category\Category;
use App\Entity\Traits\WithCreatedAt;
use App\Entity\Traits\WithMedia;
use App\Entity\Traits\WithUpdatedAt;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book
{

    use WithCreatedAt;
    use WithUpdatedAt;
    use WithMedia;

    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $yearPublication;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $pageCount;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $status;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $countLike;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Category\Category")
     */
    private $category;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Book
     */
    public function setTitle(string $title): Book
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Book
     */
    public function setDescription(string $description): Book
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * @param string $author
     *
     * @return Book
     */
    public function setAuthor(string $author): Book
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return string
     */
    public function getYearPublication(): ?string
    {
        return $this->yearPublication;
    }

    /**
     * @param string $yearPublication
     *
     * @return Book
     */
    public function setYearPublication(string $yearPublication): Book
    {
        $this->yearPublication = $yearPublication;

        return $this;
    }

    /**
     * @return int
     */
    public function getPageCount(): ?int
    {
        return $this->pageCount;
    }

    /**
     * @param int $pageCount
     *
     * @return Book
     */
    public function setPageCount(int $pageCount): Book
    {
        $this->pageCount = $pageCount;

        return $this;
    }

    /**
     * @return bool
     */
    public function getStatus(): ?bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     *
     * @return Book
     */
    public function setStatus(?bool $status): Book
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return int
     */
    public function getCountLike(): ?int
    {
        return $this->countLike;
    }

    /**
     * @param int|null $countLike
     *
     * @return Book
     */
    public function setCountLike(?int $countLike): Book
    {
        $this->countLike = $countLike;

        return $this;
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
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }
}