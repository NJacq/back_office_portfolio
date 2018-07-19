<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InformationsRepository")
 */
class Informations
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel_interna;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cv_url;

    public function getId()
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getTelInterna(): ?string
    {
        return $this->tel_interna;
    }

    public function setTelInterna(?string $tel_interna): self
    {
        $this->tel_interna = $tel_interna;

        return $this;
    }

    public function getCvUrl(): ?string
    {
        return $this->cv_url;
    }

    public function setCvUrl(?string $cv_url): self
    {
        $this->cv_url = $cv_url;

        return $this;
    }
}
