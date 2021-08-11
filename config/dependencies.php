<?php

use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;

$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
    EntityManagerInterface::class => function () {
        return (new EntityManagerCreator())
            ->getEntityManager();
    },
]);
$container = $builder->build();

return $container;
