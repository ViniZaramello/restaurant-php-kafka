<?php

namespace App\Application\Model\Order;

use App\Application\Model\Item\Item;
use DateTime;

class Order
{
    private string $id;
    private int $orderTicketId;
    private DateTime $date;
    private array $items;
    private Type $status = Type::CREATED;

    public function __construct($id, $itemList)
    {
        $this->id = $id;
        $this->date = new DateTime();
        $this->validateItemList($itemList);
        $this->items = $itemList;
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

    public function setStatus(Type $status): void
    {
        $this->status = $status;
    }

    public function setOrderTicketId(int $orderTicketId): void
    {
        $this->orderTicketId = $orderTicketId;
    }

    public function getOrder(): Order
    {
        return $this;
    }
}
