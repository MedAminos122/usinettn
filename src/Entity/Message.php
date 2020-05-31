<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity=etudiant::class, inversedBy="messages")
     */
    private $id_etudiant;

    /**
     * @ORM\ManyToOne(targetEntity=enseignant::class, inversedBy="messages")
     */
    private $id_enseignant;

    /**
     * @ORM\ManyToOne(targetEntity=discussion::class, inversedBy="messages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_discussion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

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

    public function getIdEnseignant(): ?enseignant
    {
        return $this->id_enseignant;
    }

    public function setIdEnseignant(?enseignant $id_enseignant): self
    {
        $this->id_enseignant = $id_enseignant;

        return $this;
    }

    public function getIdDiscussion(): ?discussion
    {
        return $this->id_discussion;
    }

    public function setIdDiscussion(?discussion $id_discussion): self
    {
        $this->id_discussion = $id_discussion;

        return $this;
    }
}
