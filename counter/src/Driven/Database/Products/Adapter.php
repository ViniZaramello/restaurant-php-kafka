<?php

namespace App\Driven\Database\Products;

use App\Application\Model\Product\Product;
use App\Application\Ports\Outbound\Product\ProductPort;
use PDO;
use PDOException;

class Adapter implements ProductPort
{

    public function __construct(private readonly PDO $client)
    {
    }

    public function getProduct(int $id): Product
    {
        try {
            $pdo = $this->client;

            $product = $pdo->prepare("SELECT 1 FROM order_product WHERE order_id = :orderId");

            $product->bindValue(':orderId', $id, PDO::PARAM_INT);
            $product->execute();

            return $product->fetch(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            throw new PDOException($pdo->errorInfo()[2]);
        }
    }
}
