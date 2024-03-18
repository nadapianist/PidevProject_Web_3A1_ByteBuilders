<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\RatingRepository;
#[ORM\Entity(repositoryClass: RatingRepository::class)]

class Rating
{
    /**
     * @var int
     *
     * @ORM\Column(name="idR", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idr;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ratingDate", type="date", nullable=false)
     */
    private $ratingdate;

    /**
     * @var int
     *
     * @ORM\Column(name="nbStars", type="integer", nullable=false)
     */
    private $nbstars;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userId", referencedColumnName="UserID")
     * })
     */
    private $userid;

    /**
     * @var \Location
     *
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdLoc", referencedColumnName="ID")
     * })
     */
    private $idloc;

    public function getIdr(): ?int
    {
        return $this->idr;
    }

    public function getRatingdate(): ?\DateTimeInterface
    {
        return $this->ratingdate;
    }

    public function setRatingdate(\DateTimeInterface $ratingdate): static
    {
        $this->ratingdate = $ratingdate;

        return $this;
    }

    public function getNbstars(): ?int
    {
        return $this->nbstars;
    }

    public function setNbstars(int $nbstars): static
    {
        $this->nbstars = $nbstars;

        return $this;
    }

    public function getUserid(): ?User
    {
        return $this->userid;
    }

    public function setUserid(?User $userid): static
    {
        $this->userid = $userid;

        return $this;
    }

    public function getIdloc(): ?Location
    {
        return $this->idloc;
    }

    public function setIdloc(?Location $idloc): static
    {
        $this->idloc = $idloc;

        return $this;
    }


}
