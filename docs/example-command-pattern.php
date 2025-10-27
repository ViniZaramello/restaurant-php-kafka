<?php

// Exemplo de uso do padrão Command implementado

// 1. Primeiro, crie os itens do pedido
use App\Application\Model\Item\Item;
use Ramsey\Uuid\Uuid;

$item1 = new Item(
    Uuid::uuid4(),
    'Pizza Margherita',
    25.90,
    2,
    'Pizza tradicional',
    ['queijo', 'tomate', 'manjericão'],
    []
);

$item2 = new Item(
    Uuid::uuid4(),
    'Refrigerante',
    5.00,
    2,
    'Coca-Cola 350ml',
    [],
    []
);

// 2. Crie o comando CreateOrder
use App\Application\Command\CreateOrder;

$createOrderCommand = new CreateOrder(
    [$item1, $item2],
    new DateTime()
);

// 3. Use o CommandBus para despachar o comando
use App\Application\Service\CommandBusFactory;

$commandBus = CommandBusFactory::create();
$order = $commandBus->dispatch($createOrderCommand);

// 4. O pedido foi criado!
echo "Pedido criado com ID: " . $order->getOrder()->getId();

