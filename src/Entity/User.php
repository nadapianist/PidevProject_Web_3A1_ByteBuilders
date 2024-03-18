<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
#[ORM\Entity(repositoryClass: UserRepository::class)]

class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="UserID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Fname", type="string", length=50, nullable=true)
     */
    private $fname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Lname", type="string", length=50, nullable=true)
     */
    private $lname;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="pwd", type="string", length=100, nullable=false)
     */
    private $pwd;

    /**
     * @var int|null
     *
     * @ORM\Column(name="phone", type="integer", nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=10, nullable=false)
     */
    private $role;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Bio", type="string", length=100, nullable=true)
     */
    private $bio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Preferences", type="string", length=100, nullable=true)
     */
    private $preferences;

    /**
     * @var string|null
     *
     * @ORM\Column(name="availability", type="string", length=100, nullable=true)
     */
    private $availability;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verifcode", type="string", length=50, nullable=true)
     */
    private $verifcode;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Hostel", inversedBy="idtourist")
     * @ORM\JoinTable(name="reservation",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Idtourist", referencedColumnName="UserID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDh", referencedColumnName="IDHostel")
     *   }
     * )
     */
    private $idh = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idh = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getUserid(): ?int
    {
        return $this->userid;
    }

    public function getFname(): ?string
    {
        return $this->fname;
    }

    public function setFname(?string $fname): static
    {
        $this->fname = $fname;

        return $this;
    }

    public function getLname(): ?string
    {
        return $this->lname;
    }

    public function setLname(?string $lname): static
    {
        $this->lname = $lname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPwd(): ?string
    {
        return $this->pwd;
    }

    public function setPwd(string $pwd): static
    {
        $this->pwd = $pwd;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): static
    {
        $this->bio = $bio;

        return $this;
    }

    public function getPreferences(): ?string
    {
        return $this->preferences;
    }

    public function setPreferences(?string $preferences): static
    {
        $this->preferences = $preferences;

        return $this;
    }

    public function getAvailability(): ?string
    {
        return $this->availability;
    }

    public function setAvailability(?string $availability): static
    {
        $this->availability = $availability;

        return $this;
    }

    public function getVerifcode(): ?string
    {
        return $this->verifcode;
    }

    public function setVerifcode(?string $verifcode): static
    {
        $this->verifcode = $verifcode;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Hostel>
     */
    public function getIdh(): Collection
    {
        return $this->idh;
    }

    public function addIdh(Hostel $idh): static
    {
        if (!$this->idh->contains($idh)) {
            $this->idh->add($idh);
        }

        return $this;
    }

    public function removeIdh(Hostel $idh): static
    {
        $this->idh->removeElement($idh);

        return $this;
    }

}
