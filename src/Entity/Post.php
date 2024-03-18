<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PostRepository;
#[ORM\Entity(repositoryClass: PostRepository::class)]

class Post
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDPost", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpost;

    /**
     * @var string
     *
     * @ORM\Column(name="ContentPost", type="string", length=500, nullable=false)
     */
    private $contentpost;

    /**
     * @var string
     *
     * @ORM\Column(name="PhotoPost", type="string", length=500, nullable=false)
     */
    private $photopost;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DatePost", type="date", nullable=false)
     */
    private $datepost;

    /**
     * @var string
     *
     * @ORM\Column(name="categoryPost", type="string", length=100, nullable=false)
     */
    private $categorypost;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="UserID", referencedColumnName="UserID")
     * })
     */
    private $userid;

    /**
     * @var \Forum
     *
     * @ORM\ManyToOne(targetEntity="Forum")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDForum", referencedColumnName="IDForum")
     * })
     */
    private $idforum;

    public function getIdpost(): ?int
    {
        return $this->idpost;
    }

    public function getContentpost(): ?string
    {
        return $this->contentpost;
    }

    public function setContentpost(string $contentpost): static
    {
        $this->contentpost = $contentpost;

        return $this;
    }

    public function getPhotopost(): ?string
    {
        return $this->photopost;
    }

    public function setPhotopost(string $photopost): static
    {
        $this->photopost = $photopost;

        return $this;
    }

    public function getDatepost(): ?\DateTimeInterface
    {
        return $this->datepost;
    }

    public function setDatepost(\DateTimeInterface $datepost): static
    {
        $this->datepost = $datepost;

        return $this;
    }

    public function getCategorypost(): ?string
    {
        return $this->categorypost;
    }

    public function setCategorypost(string $categorypost): static
    {
        $this->categorypost = $categorypost;

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

    public function getIdforum(): ?Forum
    {
        return $this->idforum;
    }

    public function setIdforum(?Forum $idforum): static
    {
        $this->idforum = $idforum;

        return $this;
    }


}
