<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TransportRepository;
#[ORM\Entity(repositoryClass: TransportRepository::class)]

class Transport
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDTr", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtr;

    /**
     * @var string
     *
     * @ORM\Column(name="Brand", type="string", length=255, nullable=false)
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="Distance", type="integer", nullable=false)
     */
    private $distance;

    /**
     * @var int
     *
     * @ORM\Column(name="ChargingTime", type="integer", nullable=false)
     */
    private $chargingtime;

    /**
     * @var int
     *
     * @ORM\Column(name="IDtourist", type="integer", nullable=false)
     */
    private $idtourist;

    public function getIdtr(): ?int
    {
        return $this->idtr;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDistance(): ?int
    {
        return $this->distance;
    }

    public function setDistance(int $distance): static
    {
        $this->distance = $distance;

        return $this;
    }

    public function getChargingtime(): ?int
    {
        return $this->chargingtime;
    }

    public function setChargingtime(int $chargingtime): static
    {
        $this->chargingtime = $chargingtime;

        return $this;
    }

    public function getIdtourist(): ?int
    {
        return $this->idtourist;
    }

    public function setIdtourist(int $idtourist): static
    {
        $this->idtourist = $idtourist;

        return $this;
    }


}
