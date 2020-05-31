<?php

namespace App\Entity;

use App\Repository\EvaluerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EvaluerRepository::class)
 */
class Evaluer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity=etudiant::class, inversedBy="evaluers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_etudiant;

    /**
     * @ORM\ManyToOne(targetEntity=cour::class, inversedBy="evaluers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_cour;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getIdEtudiant(): ?etudiant
    {
        return $this->id_etudiant;
    }

    public function setIdEtudiant(?etudiant $id_etudiant): self
    {
        $this->id_etudiant = $id_etudiant;

        return $this;
    }

    public function getIdCour(): ?cour
    {
        return $this->id_cour;
    }

    public function setIdCour(?cour $id_cour): self
    {
        $this->id_cour = $id_cour;

        return $this;
    }
}
