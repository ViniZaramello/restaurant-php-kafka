<?php

namespace App\Driver\Http\CreateOrder;

use App\Application\Command\CreateOrder;
use App\Application\Model\Item\Item;
use DateTime;
use DateTimeInterface;
use InvalidArgumentException;
use function Sodium\add;

final readonly class Request
{
    public function __construct(
        public array $items,
        public string $orderTime
    ) {
        foreach ($items as $item) {
            if ($item instanceof ItemRequest) {
                continue;
            } else {
                throw new InvalidArgumentException('All elements of listItem must be instances of Item');
            }
        }
        $this->validateTimeFormat();
    }
    public function validateTimeFormat(): void
    {
        $date = DateTime::createFromFormat(DateTimeInterface::RFC3339, $this->orderTime);

        if ($date !== false && $date->format(DateTimeInterface::RFC3339) === $this->orderTime) {
            return;
        } else {
            throw  new InvalidArgumentException('Invalid time format');
        }
    }

    public function toCommand(): CreateOrder
    {
        $itemList = [];
        foreach ($this->items as $item) {
            $itemList[] = new Item(
                $item->id,
                $item->quantity,
                $item->ingredientsRemove
            );
        }

        return new CreateOrder(
            $itemList,
            $this->orderTime
        );
    }
}
