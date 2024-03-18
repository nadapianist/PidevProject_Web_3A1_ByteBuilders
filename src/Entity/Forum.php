<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ForumRepository;
#[ORM\Entity(repositoryClass: ForumRepository::class)]

class Forum
{
    /**
     * @var int
     *
     * @ORM\Column(name="IDForum", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idforum;

    /**
     * @var string
     *
     * @ORM\Column(name="ContentForum", type="string", length=200, nullable=false)
     */
    private $contentforum;

    /**
     * @var int
     *
     * @ORM\Column(name="NB_posts", type="integer", nullable=false)
     */
    private $nbPosts;

    /**
     * @var string
     *
     * @ORM\Column(name="Category", type="string", length=150, nullable=false)
     */
    private $category;

    public function getIdforum(): ?int
    {
        return $this->idforum;
    }

    public function getContentforum(): ?string
    {
        return $this->contentforum;
    }

    public function setContentforum(string $contentforum): static
    {
        $this->contentforum = $contentforum;

        return $this;
    }

    public function getNbPosts(): ?int
    {
        return $this->nbPosts;
    }

    public function setNbPosts(int $nbPosts): static
    {
        $this->nbPosts = $nbPosts;

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


}
