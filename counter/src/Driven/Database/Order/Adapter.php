<?php

namespace App\Driven\Database\Order;

use App\Application\Model\Item\Item;
use App\Application\Model\Order\Order;
use App\Application\Ports\Outbound\Database\Order\OrderPort;
use PDO;
use PDOException;

class Adapter implements OrderPort
{
    public function __construct(private readonly PDO $client)
    {
    }

    function push(Order $order): string
    {
        $total = 0;
        $pdo = $this->client;
        try {
            $pdo->beginTransaction();

            //DONE: Durante a criação do item_order ele vai verificar se existe esses produtos e vai salvar o valor na lista

            //TODO: Primeiro ele vai criar order
            $pdo->prepare("INSERT INTO order_table (idt_order, dat_order, number_table, status_order, num_total) 
                VALUES(:idt_order, :dat_order, :number_table, :status_order, :num_total)")
                ->execute([
                    "idt_order" => $order->id,
                    "dat_order" => $order->date,
                    "number_table" => $order->tableNumber,
                    "status_order" => $order->status,
                    "num_total" => $total
                ]);
            //TODO: Pegar o num_total e fazer uma query para somar a conta com base nos item_order que existe atrelado ao id da order
            //TODO: Depois ele vai criar o item_order

            //TODO: Ai sim ele vai salvar

        } catch (PDOException $e) {
            $pdo->rollBack();
        }
    }
}