<?php

namespace App\Driver\Http\CreateOrder;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Endpoint extends AbstractController
{
    #[Route('/hello', name: 'hello_get', methods: ['GET'])]
    public function example(): Response
    {
        return new Response('Hello from GET endpoint!');
    }
}