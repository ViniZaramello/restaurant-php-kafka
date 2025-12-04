<?php

namespace App\Driver\Http\CreateOrder;

use App\Application\Command\CommandHandler;
use App\Application\Ports\Inbound\CommandBusInterface;
use App\Application\Service\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class Endpoint extends AbstractController
{
    #[Route('/order/create', name: 'createOrder_post', methods: ['POST'])]
    public function __invoke(
        Request $request,
        CommandBusInterface $commandBus = new CommandBus,
    ): Response
    {
        $command = $request->toCommand();
        $orderId = $commandBus->dispatch($command);

        return new Response("Order ID: $orderId");

    }
}