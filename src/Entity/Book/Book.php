<?php

namespace App\Entity\Book;

use App\Entity\Category\Category;
use App\Entity\Traits\WithCreatedAt;
use App\Entity\Traits\WithMedia;
use App\Entity\Traits\WithUpdatedAt;
use Doctrine\ORM\Mapping as ORM;

/**
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
    private $name;

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
    private $year_publication;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $page_count;

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
    private $count_like;

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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Book
     */
    public function setName(string $name): Book
    {
        $this->name = $name;

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
        return $this->year_publication;
    }

    /**
     * @param string $year_publication
     *
     * @return Book
     */
    public function setYearPublication(string $year_publication): Book
    {
        $this->year_publication = $year_publication;

        return $this;
    }

    /**
     * @return int
     */
    public function getPageCount(): ?int
    {
        return $this->page_count;
    }

    /**
     * @param int $page_count
     *
     * @return Book
     */
    public function setPageCount(int $page_count): Book
    {
        $this->page_count = $page_count;

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
        return $this->count_like;
    }

    /**
     * @param int|null $count_like
     *
     * @return Book
     */
    public function setCountLike(?int $count_like): Book
    {
        $this->count_like = $count_like;

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