<?php

namespace App\Application\Command;

use App\Application\Model\Item\Item;
use DateTime;

class CreateOrder implements CommandHandler
{
    private array $items;
    private DateTime $orderTime;

    public function __construct(array $items, DateTime $orderTime)
    {
        $this->validateItemList($items);
        $this->items = $items;
        $this->orderTime = $orderTime;
    }

    public function validateItemList(array $itemList): void
    {
        foreach ($itemList as $item) {
            if ($item instanceof Item) {
                continue;
            } else {
                throw new \InvalidArgumentException('All elements of listItem must be instances of Item');
            }
        }
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getOrderTime(): DateTime
    {
        return $this->orderTime;
    }
}