<?php

namespace App\Application\Ports\Outbound\Database\Order;

use App\Application\Model\Order\Order;

interface OrderPort
{
    function push(Order $order): string;
}
