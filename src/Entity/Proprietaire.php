<?php

namespace App\Entity;

use App\Repository\ProprietaireRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProprietaireRepository::class)]
class Proprietaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 10)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $disponibilités = null;

    #[ORM\OneToMany(mappedBy: 'proprietaire', targetEntity: Gites::class)]
    private Collection $gites;

    public function __construct()
    {
        $this->gites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getDisponibilités(): ?string
    {
        return $this->disponibilités;
    }

    public function setDisponibilités(string $disponibilités): static
    {
        $this->disponibilités = $disponibilités;

        return $this;
    }

    /**
     * @return Collection<int, Gites>
     */
    public function getGites(): Collection
    {
        return $this->gites;
    }

    public function addGite(Gites $gite): static
    {
        if (!$this->gites->contains($gite)) {
            $this->gites->add($gite);
            $gite->setProprietaire($this);
        }

        return $this;
    }

    public function removeGite(Gites $gite): static
    {
        if ($this->gites->removeElement($gite)) {
            // set the owning side to null (unless already changed)
            if ($gite->getProprietaire() === $this) {
                $gite->setProprietaire(null);
            }
        }

        return $this;
    }
}
