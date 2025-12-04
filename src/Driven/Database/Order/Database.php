<?php

namespace App\Driven\Database\Order;

use App\Application\Model\Id;
use App\Application\Model\Item\Item;
use DateTime;

final readonly class Database
{
    public function __construct(
        public ?Id $id,
        public DateTime $date = new DateTime(),
        public int $tableNumber = 0,
        /**@var Item[] $items */
        public array $items,
        public float $totalPrice = 0.00,
        public Type $status = Type::CREATED,
    ) {
    }
}