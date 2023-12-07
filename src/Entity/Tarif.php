<?php

namespace App\Entity;

use App\Repository\TarifRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TarifRepository::class)]
class Tarif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prix = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $debutPeriode = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $finPeriode = null;

    #[ORM\ManyToOne(inversedBy: 'tarifs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Gites $gite = null;

    #[ORM\Column(length: 255)]
    private ?string $periode = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDebutPeriode(): ?\DateTimeInterface
    {
        return $this->debutPeriode;
    }

    public function setDebutPeriode(\DateTimeInterface $debutPeriode): static
    {
        $this->debutPeriode = $debutPeriode;

        return $this;
    }

    public function getFinPeriode(): ?\DateTimeInterface
    {
        return $this->finPeriode;
    }

    public function setFinPeriode(\DateTimeInterface $finPeriode): static
    {
        $this->finPeriode = $finPeriode;

        return $this;
    }

    public function getGite(): ?gites
    {
        return $this->gite;
    }

    public function setGite(?gites $gite): static
    {
        $this->gite = $gite;

        return $this;
    }

    public function getPeriode(): ?string
    {
        return $this->periode;
    }

    public function setPeriode(string $periode): static
    {
        $this->periode = $periode;

        return $this;
    }
}
