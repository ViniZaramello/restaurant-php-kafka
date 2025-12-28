<?php

namespace App\Application\Service;

use App\Application\Handler\CreateOrderHandler;
use App\Application\Command\CreateOrder;
use Symfony\Component\DependencyInjection\ServiceLocator;

class CommandBusFactory
{
    public static function create(): CommandBus
    {
        $commandBus = new CommandBus();

        // Registrar handlers para cada comando
        $commandBus->registerHandler(CreateOrder::class, new CreateOrderHandler());

        // Adicione aqui outros handlers conforme você cria novos comandos
        // Exemplo: $commandBus->registerHandler(CreateItem::class, new CreateItemHandler());

        return $commandBus;
    }
}

