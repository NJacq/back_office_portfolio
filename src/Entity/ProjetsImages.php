<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjetsImagesRepository")
 */
class ProjetsImages
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_projet;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_image;

    public function getId()
    {
        return $this->id;
    }

    public function getIdProjet(): ?int
    {
        return $this->id_projet;
    }

    public function setIdProjet(?int $id_projet): self
    {
        $this->id_projet = $id_projet;

        return $this;
    }

    public function getIdImage(): ?int
    {
        return $this->id_image;
    }

    public function setIdImage(?int $id_image): self
    {
        $this->id_image = $id_image;

        return $this;
    }
}
