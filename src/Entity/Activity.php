<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ActivityRepository;
#[ORM\Entity(repositoryClass: App\Repository\ActivityRepository::class)]
/**
 * Activity
 *
 * @ORM\Table(name="activity")
 * @ORM\Entity(repositoryClass="App\Repository\ActivityRepository")
 */
class Activity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_act", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAct;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_act", type="date", nullable=false)
     */
    private $dateAct;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=512, nullable=false)
     */
    private $image;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Location", inversedBy="activity")
     * @ORM\JoinTable(name="association_activity_location",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Activity", referencedColumnName="id_act")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Location", referencedColumnName="ID")
     *   }
     * )
     */
    private $location = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Challenge", inversedBy="idactivity")
     * @ORM\JoinTable(name="reviewchallenge",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDActivity", referencedColumnName="id_act")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_challenge", referencedColumnName="id_chall")
     *   }
     * )
     */
    private $idChallenge = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->location = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idChallenge = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdAct(): ?int
    {
        return $this->idAct;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDateAct(): ?\DateTimeInterface
    {
        return $this->dateAct;
    }

    public function setDateAct(\DateTimeInterface $dateAct): static
    {
        $this->dateAct = $dateAct;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getLocation(): Collection
    {
        return $this->location;
    }

    public function addLocation(Location $location): static
    {
        if (!$this->location->contains($location)) {
            $this->location->add($location);
        }

        return $this;
    }

    public function removeLocation(Location $location): static
    {
        $this->location->removeElement($location);

        return $this;
    }

    /**
     * @return Collection<int, Challenge>
     */
    public function getIdChallenge(): Collection
    {
        return $this->idChallenge;
    }

    public function addIdChallenge(Challenge $idChallenge): static
    {
        if (!$this->idChallenge->contains($idChallenge)) {
            $this->idChallenge->add($idChallenge);
        }

        return $this;
    }

    public function removeIdChallenge(Challenge $idChallenge): static
    {
        $this->idChallenge->removeElement($idChallenge);

        return $this;
    }

}
