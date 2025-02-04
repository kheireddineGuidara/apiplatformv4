<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[Get()]
#[GetCollection(
//    paginationEnabled: true,
//    paginationItemsPerPage: 20,
//    paginationClientEnabled: true,
//    paginationClientItemsPerPage: true,
    uriTemplate: '/getarticle',
    name: 'getarticle',
)]
#[GetCollection(
    uriTemplate: '/getarticle2',
    name: 'getarticle2',
)]
#[GetCollection()]
#[Post()]
#[Put()]
#[Patch()]
#[Delete()]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(
//        message: 'Not Blank',
    )]
    #[Assert\Length(min: 5, max: 255)]
    #[ApiProperty(description: "The title of the article")]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank]
    #[ApiProperty(description: "The content of the article")]
    private ?string $content = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $publishedAt = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $no = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $q = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeImmutable $publishedAt): static
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getNo(): ?string
    {
        return $this->no;
    }

    public function setNo(string $no): static
    {
        $this->no = $no;

        return $this;
    }

    public function getQ(): ?string
    {
        return $this->q;
    }

    public function setQ(string $q): static
    {
        $this->q = $q;

        return $this;
    }

    #[ORM\PrePersist]
    public function setPublishedAtValue(): void
    {
        $this->publishedAt = new \DateTimeImmutable();
    }
}