<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LocationRepository;
#[ORM\Entity(repositoryClass: LocationRepository::class)]

class Location
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=250, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Info", type="string", length=500, nullable=false)
     */
    private $info;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=50, nullable=false)
     */
    private $category;

    /**
     * @var \Hostel
     *
     * @ORM\ManyToOne(targetEntity="Hostel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hostel", referencedColumnName="IDHostel")
     * })
     */
    private $hostel;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Activity", mappedBy="location")
     */
    private $activity = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->activity = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(string $info): static
    {
        $this->info = $info;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getHostel(): ?Hostel
    {
        return $this->hostel;
    }

    public function setHostel(?Hostel $hostel): static
    {
        $this->hostel = $hostel;

        return $this;
    }

    /**
     * @return Collection<int, Activity>
     */
    public function getActivity(): Collection
    {
        return $this->activity;
    }

    public function addActivity(Activity $activity): static
    {
        if (!$this->activity->contains($activity)) {
            $this->activity->add($activity);
            $activity->addLocation($this);
        }

        return $this;
    }

    public function removeActivity(Activity $activity): static
    {
        if ($this->activity->removeElement($activity)) {
            $activity->removeLocation($this);
        }

        return $this;
    }

}
