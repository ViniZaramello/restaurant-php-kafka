<?php

namespace App\Application\Command;

use App\Application\Model\Item\Item;
use DateTime;
use InvalidArgumentException;

final readonly class CreateOrder implements CommandHandler
{
    public function __construct(
        /**@var Item[] $items */
        public array $items,
        public string $orderTime
    ) {
    }
}
