<?php

namespace App\Application\Ports\Inbound;

use App\Application\Command\CommandHandler;

interface CommandHandlerInterface
{
    public function handle(CommandHandler $command): mixed;
}
