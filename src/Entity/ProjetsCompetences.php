<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjetsCompetencesRepository")
 */
class ProjetsCompetences
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
    private $id_competence;

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

    public function getIdCompetence(): ?int
    {
        return $this->id_competence;
    }

    public function setIdCompetence(?int $id_competence): self
    {
        $this->id_competence = $id_competence;

        return $this;
    }
}
