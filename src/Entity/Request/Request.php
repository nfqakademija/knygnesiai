<?php

namespace App\Entity\Request;

use App\Entity\Book\Book;
use App\Entity\Traits\WithCreatedAt;
use App\Entity\Traits\WithUpdatedAt;
use App\Entity\User\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="App\Repository\RequestRepository")
 */
class Request
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
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User\User")
     */
    private $user;

    /**
     * @var Book
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Book\Book", inversedBy="requests")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $book;

    /**
     * @var Book
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Book\Book", inversedBy="changeBooks")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $bookToChange;

    /**
     * @var boolean
     *
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int $status
     *
     * @return $this
     */
    public function setStatus(int $status): self
    {
        $this->status = $status;

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
     */
    public function setBook(Book $book): void
    {
        $this->book = $book;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return Book
     */
    public function getBookToChange(): Book
    {
        return $this->bookToChange;
    }

    /**
     * @param Book $bookToChange
     */
    public function setBookToChange(Book $bookToChange): void
    {
        $this->bookToChange = $bookToChange;
    }
}
