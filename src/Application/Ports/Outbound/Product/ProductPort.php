<?php

namespace App\Application\Ports\Outbound\Product;

use App\Application\Model\Product\Product;

interface ProductPort
{
    public function getProduct(int $id): Product;
}
