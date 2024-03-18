<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ChallengeRepository;
#[ORM\Entity(repositoryClass: ChallengeRepository::class)]

class Challenge
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_chall", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idChall;

    /**
     * @var string
     *
     * @ORM\Column(name="name_ch", type="string", length=255, nullable=false)
     */
    private $nameCh;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_ch", type="string", length=1000, nullable=false)
     */
    private $descCh;

    /**
     * @var int
     *
     * @ORM\Column(name="points", type="integer", nullable=false)
     */
    private $points;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Activity", mappedBy="idChallenge")
     */
    private $idactivity = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idactivity = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdChall(): ?int
    {
        return $this->idChall;
    }

    public function getNameCh(): ?string
    {
        return $this->nameCh;
    }

    public function setNameCh(string $nameCh): static
    {
        $this->nameCh = $nameCh;

        return $this;
    }

    public function getDescCh(): ?string
    {
        return $this->descCh;
    }

    public function setDescCh(string $descCh): static
    {
        $this->descCh = $descCh;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): static
    {
        $this->points = $points;

        return $this;
    }

    /**
     * @return Collection<int, Activity>
     */
    public function getIdactivity(): Collection
    {
        return $this->idactivity;
    }

    public function addIdactivity(Activity $idactivity): static
    {
        if (!$this->idactivity->contains($idactivity)) {
            $this->idactivity->add($idactivity);
            $idactivity->addIdChallenge($this);
        }

        return $this;
    }

    public function removeIdactivity(Activity $idactivity): static
    {
        if ($this->idactivity->removeElement($idactivity)) {
            $idactivity->removeIdChallenge($this);
        }

        return $this;
    }

}
