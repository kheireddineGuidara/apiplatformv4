<?php

namespace App\Dto;
class ArticleAuthorResponseDto
{
    private ?string $title=null;
    private ?string $author=null;

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
    public function getAuthor()
    {
        return $this->author;
    }
    public function setAuthor($author)
    {
        $this->author = $author;
    }
}