<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\Article;
use App\Entity\Author;
use Doctrine\ORM\EntityManagerInterface;

class ArticleAuthStateProcessor implements ProcessorInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): void
    {
        $author = new Author();
        $author->setFirstName($data->getFirstName());
        $author->setLastName($data->getLastName());

        $article = new Article();
        $article->setTitle($data->getTitle());
        $article->setContent($data->getContent());
        $article->setPublishedAt(new \DateTimeImmutable());
        $article->setAuthor($author);

        $this->entityManager->persist($author);
        $this->entityManager->persist($article);

        $this->entityManager->flush();
    }
}
