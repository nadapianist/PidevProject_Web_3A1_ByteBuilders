<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\HostelRepository;
#[ORM\Entity(repositoryClass: HostelRepository::class)]

class Hostel
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDHostel", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idhostel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Name_hostel", type="string", length=255, nullable=true)
     */
    private $nameHostel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="NBstars", type="integer", nullable=true)
     */
    private $nbstars;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Info", type="string", length=255, nullable=true)
     */
    private $info;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="idh")
     */
    private $idtourist = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idtourist = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdhostel(): ?int
    {
        return $this->idhostel;
    }

    public function getNameHostel(): ?string
    {
        return $this->nameHostel;
    }

    public function setNameHostel(?string $nameHostel): static
    {
        $this->nameHostel = $nameHostel;

        return $this;
    }

    public function getNbstars(): ?int
    {
        return $this->nbstars;
    }

    public function setNbstars(?int $nbstars): static
    {
        $this->nbstars = $nbstars;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(?string $info): static
    {
        $this->info = $info;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getIdtourist(): Collection
    {
        return $this->idtourist;
    }

    public function addIdtourist(User $idtourist): static
    {
        if (!$this->idtourist->contains($idtourist)) {
            $this->idtourist->add($idtourist);
            $idtourist->addIdh($this);
        }

        return $this;
    }

    public function removeIdtourist(User $idtourist): static
    {
        if ($this->idtourist->removeElement($idtourist)) {
            $idtourist->removeIdh($this);
        }

        return $this;
    }

}
