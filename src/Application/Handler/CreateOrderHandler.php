<?php

namespace App\Application\Handler;

use App\Application\Command\CreateOrder;
use App\Application\Command\CommandHandler;
use App\Application\Model\Id;
use App\Application\Model\Order\Order;
use App\Application\Ports\Inbound\CommandHandlerInterface;
use App\Application\Ports\Outbound\Database\Order\OrderPort;
use App\Application\Ports\Outbound\Product\ProductPort;
use App\Driven\IdAdapter;
use Ramsey\Uuid\Uuid;

class CreateOrderHandler implements CommandHandlerInterface
{
    private function __construct(
        private ProductPort $productPort,
        private OrderPort $orderPort
    )
    {
    }

    public function handle(CommandHandler $command): mixed
    {
        $total = 0.00;
        if (!$command instanceof CreateOrder) {
            throw new \InvalidArgumentException('Expected CreateOrder command');
        }


        //TODO: Fazer um foreach para validar cada item do pedido verificar se existe o produto no banco
        foreach ($command->getItems() as $item ) {
            $this->productPort->getProduct($item->id);
            $total = $total + $item->price;
        }

        //TODO: Ao salvar no banco, deverá retornar um orderTicketId
        $orderId = Id::class->generate();
        $order = new Order(
            id: $orderId,
            items: $command->items,
            totalPrice: $total
        );
        return $order->id;
    }

    private function countPrice()
    {

    }
}
