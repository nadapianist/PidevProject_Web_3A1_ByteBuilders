<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommentRepository;
#[ORM\Entity(repositoryClass: CommentRepository::class)]

class Comment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="commentt", type="string", length=255, nullable=false)
     */
    private $commentt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_c", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateC = 'CURRENT_TIMESTAMP';

    /**
     * @var \Post
     *
     * @ORM\ManyToOne(targetEntity="Post")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="post_id", referencedColumnName="IDPost")
     * })
     */
    private $post;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="UserID")
     * })
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentt(): ?string
    {
        return $this->commentt;
    }

    public function setCommentt(string $commentt): static
    {
        $this->commentt = $commentt;

        return $this;
    }

    public function getDateC(): ?\DateTimeInterface
    {
        return $this->dateC;
    }

    public function setDateC(\DateTimeInterface $dateC): static
    {
        $this->dateC = $dateC;

        return $this;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): static
    {
        $this->post = $post;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }


}
