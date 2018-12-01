<?php

namespace App\Entity\Book;

use App\Entity\Category\Category;
use App\Entity\Request\Request;
use App\Entity\Traits\WithCreatedAt;
use App\Entity\Traits\WithMedia;
use App\Entity\Traits\WithUpdatedAt;
use App\Entity\User\User;
use App\Entity\WishList\WishList;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

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
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $status;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Category\Category")
     */
    private $category;

    /**
     * @var ArrayCollection|PersistentCollection|array|WishList[]
     *
     * @ORM\OneToMany(targetEntity="App\Entity\WishList\WishList", mappedBy="book" , cascade={"persist", "remove"},
     *                                                                              orphanRemoval=true)
     */
    private $wishLists;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User\User")
     */
    private $user;

    /**
     * @var ArrayCollection|PersistentCollection|array|Request[]
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Request\Request", mappedBy="book" , cascade={"persist", "remove"},
     *                                                                              orphanRemoval=true)
     */
    private $requests;

    /**
     * @var ArrayCollection|PersistentCollection|array|Request[]
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Request\Request", mappedBy="bookToChange" , cascade={"persist", "remove"},
     *                                                                              orphanRemoval=true)
     */
    private $changeBooks;


    /**
     * Book constructor.
     */
    public function __construct()
    {
        $this->wishLists = new ArrayCollection();
        $this->requests = new ArrayCollection();
        $this->changeBooks = new ArrayCollection();
    }
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
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     *
     * @return Book
     */
    public function setStatus(int $status): Book
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return category
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

    /**
     * @return WishList[]|array|ArrayCollection|PersistentCollection
     */
    public function getWishLists()
    {
        return $this->wishLists;
    }

    /**
     * @param WishList[]
     *
     * @return $this
     */
    public function setWishLists($wishLists): self
    {
        $this->wishLists = $wishLists;

        return $this;
    }

    /**
     * @param WishList $wishList
     *
     * @return $this
     */
    public function addWishList(WishList $wishList)
    {
        if (!$this->wishLists->contains($wishList)) {
            $this->wishLists->add($wishList);

            $wishList->setBook($this);
        }

        return $this;
    }

    /**
     * @param WishList $wishList
     *
     * @return $this
     */
    public function removeWishList(WishList $wishList)
    {
        if ($this->wishLists->contains($wishList)) {
            $this->wishLists->removeElement($wishList);
        }

        return $this;
    }

    /**
     * @return Request[]|array|ArrayCollection|PersistentCollection
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * @param Request[]
     *
     * @return $this
     */
    public function setRequests($requests): self
    {
        $this->requests = $requests;

        return $this;
    }

    /**
     * @param Request $request
     *
     * @return $this
     */
    public function addRequest(Request $request)
    {
        if (!$this->requests->contains($request)) {
            $this->requests->add($request);

            $request->setBook($this);
        }

        return $this;
    }

    /**
     * @param Request $request
     *
     * @return $this
     */
    public function removeRequest(Request $request)
    {
        if ($this->requests->contains($request)) {
            $this->requests->removeElement($request);
        }

        return $this;
    }

    /**
     * @return Request[]|array|ArrayCollection|PersistentCollection
     */
    public function getChangeBooks()
    {
        return $this->changeBooks;
    }

    /**
     * @param Request[]
     *
     * @return $this
     */
    public function setChangeBooks($changeBooks): self
    {
        $this->changeBooks = $changeBooks;

        return $this;
    }

    /**
     * @param Request $changeBook
     *
     * @return $this
     */
    public function addChangeBook(Request $changeBook)
    {
        if (!$this->changeBooks->contains($changeBook)) {
            $this->changeBooks->add($changeBook);

            $changeBook->setBookToChange($this);
        }

        return $this;
    }

    /**
     * @param Request $changeBook
     *
     * @return $this
     */
    public function removeChangeBook(Request $changeBook)
    {
        if ($this->changeBooks->contains($changeBook)) {
            $this->changeBooks->removeElement($changeBook);
        }

        return $this;
    }



}