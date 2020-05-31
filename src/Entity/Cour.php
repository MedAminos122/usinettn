<?php

namespace App\Entity;

use App\Repository\CourRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourRepository::class)
 */
class Cour
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
     * @ORM\Column(type="integer")
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity=classe::class, inversedBy="cours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_classe;

    /**
     * @ORM\OneToMany(targetEntity=Livre::class, mappedBy="id_cour")
     */
    private $livres;

    /**
     * @ORM\OneToMany(targetEntity=Fichier::class, mappedBy="id_cour")
     */
    private $fichiers;

    /**
     * @ORM\ManyToOne(targetEntity=enseignant::class, inversedBy="cours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_enseignant;

    /**
     * @ORM\OneToMany(targetEntity=Evaluer::class, mappedBy="id_cour")
     */
    private $evaluers;

    public function __construct()
    {
        $this->livres = new ArrayCollection();
        $this->fichiers = new ArrayCollection();
        $this->evaluers = new ArrayCollection();
    }

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

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getIdClasse(): ?classe
    {
        return $this->id_classe;
    }

    public function setIdClasse(?classe $id_classe): self
    {
        $this->id_classe = $id_classe;

        return $this;
    }

    /**
     * @return Collection|Livre[]
     */
    public function getLivres(): Collection
    {
        return $this->livres;
    }

    public function addLivre(Livre $livre): self
    {
        if (!$this->livres->contains($livre)) {
            $this->livres[] = $livre;
            $livre->setIdCour($this);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): self
    {
        if ($this->livres->contains($livre)) {
            $this->livres->removeElement($livre);
            // set the owning side to null (unless already changed)
            if ($livre->getIdCour() === $this) {
                $livre->setIdCour(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Fichier[]
     */
    public function getFichiers(): Collection
    {
        return $this->fichiers;
    }

    public function addFichier(Fichier $fichier): self
    {
        if (!$this->fichiers->contains($fichier)) {
            $this->fichiers[] = $fichier;
            $fichier->setIdCour($this);
        }

        return $this;
    }

    public function removeFichier(Fichier $fichier): self
    {
        if ($this->fichiers->contains($fichier)) {
            $this->fichiers->removeElement($fichier);
            // set the owning side to null (unless already changed)
            if ($fichier->getIdCour() === $this) {
                $fichier->setIdCour(null);
            }
        }

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

    /**
     * @return Collection|Evaluer[]
     */
    public function getEvaluers(): Collection
    {
        return $this->evaluers;
    }

    public function addEvaluer(Evaluer $evaluer): self
    {
        if (!$this->evaluers->contains($evaluer)) {
            $this->evaluers[] = $evaluer;
            $evaluer->setIdCour($this);
        }

        return $this;
    }

    public function removeEvaluer(Evaluer $evaluer): self
    {
        if ($this->evaluers->contains($evaluer)) {
            $this->evaluers->removeElement($evaluer);
            // set the owning side to null (unless already changed)
            if ($evaluer->getIdCour() === $this) {
                $evaluer->setIdCour(null);
            }
        }

        return $this;
    }
}
