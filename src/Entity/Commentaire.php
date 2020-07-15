<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Utilisateur::class, inversedBy="commentaires")
     */
    private $auteur;

    /**
     * @ORM\ManyToOne(targetEntity=Annonce::class, inversedBy="commentaires")
     */
    private $annonce;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creation;

    public function __construct()
    {
        $this->auteur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getAuteur(): Collection
    {
        return $this->auteur;
    }

    public function addAuteur(Utilisateur $auteur): self
    {
        if (!$this->auteur->contains($auteur)) {
            $this->auteur[] = $auteur;
        }

        return $this;
    }

    public function removeAuteur(Utilisateur $auteur): self
    {
        if ($this->auteur->contains($auteur)) {
            $this->auteur->removeElement($auteur);
        }

        return $this;
    }

    public function getAnnonce(): ?Annonce
    {
        return $this->annonce;
    }

    public function setAnnonce(?Annonce $annonce): self
    {
        $this->annonce = $annonce;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getCreation(): ?\DateTimeInterface
    {
        return $this->creation;
    }

    public function setCreation(\DateTimeInterface $creation): self
    {
        $this->creation = $creation;

        return $this;
    }
}
