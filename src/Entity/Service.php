<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $locationLinge = null;

    #[ORM\Column]
    private ?bool $menageFin = null;

    #[ORM\Column]
    private ?bool $internet = null;

    #[ORM\ManyToMany(targetEntity: Gites::class, mappedBy: 'services')]
    private Collection $gites;

    #[ORM\Column]
    private ?float $locationLingePrix = null;

    #[ORM\Column]
    private ?float $menageFinPrix = null;

    #[ORM\Column]
    private ?float $internetPrix = null;

    public function __construct()
    {
        $this->gites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isLocationLinge(): ?bool
    {
        return $this->locationLinge;
    }

    public function setLocationLinge(bool $locationLinge): static
    {
        $this->locationLinge = $locationLinge;

        return $this;
    }

    public function isMenageFin(): ?bool
    {
        return $this->menageFin;
    }

    public function setMenageFin(bool $menageFin): static
    {
        $this->menageFin = $menageFin;

        return $this;
    }

    public function isInternet(): ?bool
    {
        return $this->internet;
    }

    public function setInternet(bool $internet): static
    {
        $this->internet = $internet;

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
            $gite->addService($this);
        }

        return $this;
    }

    public function removeGite(Gites $gite): static
    {
        if ($this->gites->removeElement($gite)) {
            $gite->removeService($this);
        }

        return $this;
    }

    public function getLocationLingePrix(): ?float
    {
        return $this->locationLingePrix;
    }

    public function setLocationLingePrix(float $locationLingePrix): static
    {
        $this->locationLingePrix = $locationLingePrix;

        return $this;
    }

    public function getMenageFinPrix(): ?float
    {
        return $this->menageFinPrix;
    }

    public function setMenageFinPrix(float $menageFinPrix): static
    {
        $this->menageFinPrix = $menageFinPrix;

        return $this;
    }

    public function getInternetPrix(): ?float
    {
        return $this->internetPrix;
    }

    public function setInternetPrix(float $internetPrix): static
    {
        $this->internetPrix = $internetPrix;

        return $this;
    }
}
