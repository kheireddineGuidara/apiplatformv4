<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class InsertUserProcessor implements ProcessorInterface
{

    public function __construct(private UserPasswordHasherInterface $userPasswordHasherInterface,
    private EntityManagerInterface $entityManagerInterface)
    {
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): void
    {
        $hashedPassword = $this->userPasswordHasherInterface->hashPassword($data,$data->getPassword());
        $data->setPassword($hashedPassword);
        $this->entityManagerInterface->persist($data);
        $this->entityManagerInterface->flush();

    }
}
