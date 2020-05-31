<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 */
class Etudiant
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
    private $prenom;

    /**
     * @ORM\Column(type="integer")
     */
    private $cin;

    /**
     * @ORM\Column(type="date")
     */
    private $date_naissance;

    /**
     * @ORM\ManyToOne(targetEntity=classe::class, inversedBy="etudiants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_classe;

    /**
     * @ORM\OneToMany(targetEntity=Evaluer::class, mappedBy="id_etudiant")
     */
    private $evaluers;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="id_etudiant")
     */
    private $messages;

    public function __construct()
    {
        $this->evaluers = new ArrayCollection();
        $this->messages = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(int $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

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
            $evaluer->setIdEtudiant($this);
        }

        return $this;
    }

    public function removeEvaluer(Evaluer $evaluer): self
    {
        if ($this->evaluers->contains($evaluer)) {
            $this->evaluers->removeElement($evaluer);
            // set the owning side to null (unless already changed)
            if ($evaluer->getIdEtudiant() === $this) {
                $evaluer->setIdEtudiant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setIdEtudiant($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->contains($message)) {
            $this->messages->removeElement($message);
            // set the owning side to null (unless already changed)
            if ($message->getIdEtudiant() === $this) {
                $message->setIdEtudiant(null);
            }
        }

        return $this;
    }
}
