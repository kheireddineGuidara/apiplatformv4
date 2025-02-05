<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Repository\ArticleRepository;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class CustomGetCollectionProvider implements ProviderInterface
{

    public function __construct(private ArticleRepository $articleRepository,
//                                #[Autowire(service:'api_platform.doctrine.orm.state.collection_provider')]
                                private ProviderInterface $providerInterface)
    {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $data= $this->providerInterface->provide($operation, $uriVariables, $context);
        foreach ($data as $article) {
            $article->setTitle(strtoupper($article->getTitle()));
        }
        return $data;
//        return $this->articleRepository->findOneByTitle('title1');
    }
}
