<?php

declare(strict_types=1);

namespace App\Application\Model\Order;

use App\Application\Model\Id;
use App\Application\Model\Item\Item;
use InvalidArgumentException;
use DateTime;

final class Order
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
        $this->validateItemList($items);
    }

    private function validateItemList(array $itemList): void
    {
        foreach ($itemList as $item) {
            if ($item instanceof Item) {
                continue;
            } else {
                throw new InvalidArgumentException('All elements of listItem must be instances of Item');
            }
        }
    }
}
