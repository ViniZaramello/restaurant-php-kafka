<?php

namespace App\Application\Handler;

use App\Application\Command\CreateOrder;
use App\Application\Command\CommandHandler;
use App\Application\Model\Order\Order;
use App\Application\Ports\Inbound\CommandHandlerInterface;
use Ramsey\Uuid\Uuid;

class CreateOrderHandler implements CommandHandlerInterface
{
    public function handle(CommandHandler $command): mixed
    {
        if (!$command instanceof CreateOrder) {
            throw new \InvalidArgumentException('Expected CreateOrder command');
        }

        $orderId = Uuid::uuid4()->toString();
        //TODO: Ao salvar no banco, deverá retornar um orderTicketId

        $order = new Order(
            $orderId,
            $command->getItems()
        );
        return $orderId;
    }
}