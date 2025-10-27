<?php

namespace App\Application\Ports\Inbound;

use App\Application\Command\CommandHandler;

interface CommandBusInterface
{
    public function registerHandler(string $commandClass, CommandHandlerInterface $handler): void;

    public function dispatch(CommandHandler $command): mixed;
}
