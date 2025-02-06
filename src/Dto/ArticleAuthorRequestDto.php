<?php

namespace App\Dto;
use Symfony\Component\Validator\Constraints as Assert;
class ArticleAuthorRequestDto
{
    #[Assert\Length(
        min: 3,
        max: 10,
        minMessage: 'Your first name at least {{ limit }} characters.',
        maxMessage: 'Your first name at most {{ limit }} characters.'
    )]
    private ?string $title=null;
    private ?string $content=null;
    private ?string $firstName=null;
    private ?string $lastName=null;

    public function __construct()
    {
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

}