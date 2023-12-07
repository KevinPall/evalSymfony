<?php

namespace App\Entity;

use App\Repository\EquipementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipementRepository::class)]
class Equipement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $laveVaisselle = null;

    #[ORM\Column]
    private ?bool $laveLinge = null;

    #[ORM\Column]
    private ?bool $climatisation = null;

    #[ORM\Column]
    private ?bool $television = null;

    #[ORM\Column]
    private ?bool $terrasse = null;

    #[ORM\Column]
    private ?bool $barbecue = null;

    #[ORM\Column(nullable: true)]
    private ?int $piscine = null;

    #[ORM\Column]
    private ?bool $tennis = null;

    #[ORM\Column]
    private ?bool $pingPong = null;

    #[ORM\ManyToMany(targetEntity: Gites::class, mappedBy: 'equipements')]
    private Collection $gites;

    public function __construct()
    {
        $this->gites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isLaveVaisselle(): ?bool
    {
        return $this->laveVaisselle;
    }

    public function setLaveVaisselle(bool $laveVaisselle): static
    {
        $this->laveVaisselle = $laveVaisselle;

        return $this;
    }

    public function isLaveLinge(): ?bool
    {
        return $this->laveLinge;
    }

    public function setLaveLinge(bool $laveLinge): static
    {
        $this->laveLinge = $laveLinge;

        return $this;
    }

    public function isClimatisation(): ?bool
    {
        return $this->climatisation;
    }

    public function setClimatisation(bool $climatisation): static
    {
        $this->climatisation = $climatisation;

        return $this;
    }

    public function isTelevision(): ?bool
    {
        return $this->television;
    }

    public function setTelevision(bool $television): static
    {
        $this->television = $television;

        return $this;
    }

    public function isTerrasse(): ?bool
    {
        return $this->terrasse;
    }

    public function setTerrasse(bool $terrasse): static
    {
        $this->terrasse = $terrasse;

        return $this;
    }

    public function isBarbecue(): ?bool
    {
        return $this->barbecue;
    }

    public function setBarbecue(bool $barbecue): static
    {
        $this->barbecue = $barbecue;

        return $this;
    }

    public function getPiscine(): ?int
    {
        return $this->piscine;
    }

    public function setPiscine(?int $piscine): static
    {
        $this->piscine = $piscine;

        return $this;
    }

    public function isTennis(): ?bool
    {
        return $this->tennis;
    }

    public function setTennis(bool $tennis): static
    {
        $this->tennis = $tennis;

        return $this;
    }

    public function isPingPong(): ?bool
    {
        return $this->pingPong;
    }

    public function setPingPong(bool $pingPong): static
    {
        $this->pingPong = $pingPong;

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
            $gite->addEquipement($this);
        }

        return $this;
    }

    public function removeGite(Gites $gite): static
    {
        if ($this->gites->removeElement($gite)) {
            $gite->removeEquipement($this);
        }

        return $this;
    }
}
