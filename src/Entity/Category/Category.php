<?php

namespace App\Entity\Category;

use App\Entity\Traits\WithCreatedAt;
use App\Entity\Traits\WithUpdatedAt;
use Doctrine\ORM\Mapping as ORM;

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
}

