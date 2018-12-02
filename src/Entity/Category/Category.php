<?php

namespace App\Entity\Category;

use App\Entity\Traits\WithCreatedAt;
use App\Entity\Traits\WithUpdatedAt;
use App\Entity\WishList\WishList;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    use WithCreatedAt;
    use WithUpdatedAt;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

//    /**
//     * @var ArrayCollection|PersistentCollection|array|WishList[]
//     *
//     * @ORM\OneToMany(targetEntity="App\Entity\WishList\WishList", mappedBy="category" , cascade={"persist", "remove"})
//     */
//    private $categoryWishLists;
//
//    /**
//     * Category constructor.
//     */
//    public function __construct()
//    {
//        $this->categoryWishLists = new ArrayCollection();
//    }

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
     * @return Category
     */
    public function setTitle(string $title): Category
    {
        $this->title = $title;

        return $this;
    }
//
//    /**
//     * @return WishList[]|array|ArrayCollection|PersistentCollection
//     */
//    public function getCategoryWishLists()
//    {
//        return $this->categoryWishLists;
//    }
//
//    /**
//     * @param  $categoryWishLists WishList[]|array|ArrayCollection|PersistentCollection
//     *
//     * @return $this
//     */
//    public function setCategoryWishLists($categoryWishLists): Category
//    {
//        $this->categoryWishLists = $categoryWishLists;
//
//        return $this;
//    }
//
//    /**
//     * @param WishList $categoryWishList
//     *
//     * @return $this
//     */
//    public function addCategoryWishList(WishList $categoryWishList)
//    {
//        if (!$this->categoryWishLists->contains($categoryWishList)) {
//            $this->categoryWishLists->add($categoryWishList);
//
//            $categoryWishList->setCategory($this);
//        }
//
//        return $this;
//    }
//
//    /**
//     * @param WishList $categoryWishList
//     *
//     * @return $this
//     */
//    public function removeCategoryWishList(WishList $categoryWishList)
//    {
//        if ($this->categoryWishLists->contains($categoryWishList)) {
//            $this->categoryWishLists->removeElement($categoryWishList);
//        }
//
//        return $this;
//    }
}

