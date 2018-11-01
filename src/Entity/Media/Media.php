<?php

namespace App\Entity\Media;

use App\Entity\Interfaces\WithUploadableFileEntityInterface;
use App\Entity\Traits\WithUploadableFile;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Class Media
 * @ORM\Entity()
 *
 * @Vich\Uploadable
 */
class Media implements WithUploadableFileEntityInterface
{
    use WithUploadableFile;

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    protected function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}