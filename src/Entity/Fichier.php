<?php

namespace App\Entity;

use App\Repository\FichierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FichierRepository::class)
 */
class Fichier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $extension;

    /**
     * @ORM\Column(type="blob")
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity=cour::class, inversedBy="fichiers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_cour;

    /**
     * @ORM\ManyToOne(targetEntity=enseignant::class, inversedBy="fichiers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_enseignant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function setContenu($contenu): self
    {
        $this->contenu = $contenu;

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

    public function getIdEnseignant(): ?enseignant
    {
        return $this->id_enseignant;
    }

    public function setIdEnseignant(?enseignant $id_enseignant): self
    {
        $this->id_enseignant = $id_enseignant;

        return $this;
    }
}
