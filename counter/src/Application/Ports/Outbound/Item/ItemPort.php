<?php

namespace App\Application\Ports\Outbound\Database\Item;

use App\Application\Model\Item\Item;

interface ItemPort
{
    function push(Item $order): string;
}