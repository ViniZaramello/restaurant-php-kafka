<?php

namespace App\Application\Service;

use App\Application\Command\CommandHandler;
use App\Application\Ports\Inbound\CommandBusInterface;
use App\Application\Ports\Inbound\CommandHandlerInterface;

class CommandBus implements CommandBusInterface
{
    private array $handlers = [];

    public function registerHandler(string $commandClass, CommandHandlerInterface $handler): void
    {
        $this->handlers[$commandClass] = $handler;
    }

    public function dispatch(CommandHandler $command): mixed
    {
        $commandClass = get_class($command);

        if (!isset($this->handlers[$commandClass])) {
            throw new \RuntimeException("No handler registered for command: {$commandClass}");
        }

        return $this->handlers[$commandClass]->handle($command);
    }
}
