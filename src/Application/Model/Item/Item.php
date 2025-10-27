<?php

namespace App\Application\Model\Item;

use Ramsey\Uuid\Uuid;

class Item
{
    public Uuid $id;
    public string $name;
    public float $price;
    public int $quantity = 1;
    public ?string $description;
    public array $ingredients;
    public array $ingredientsRemoved = [];

    public function __construct(?Uuid $id, string $name, float $price, int $quantity, ?string $description = null, array $ingredients = [], array $ingredientsRemoved = [])
    {
        $id = $id ?? Uuid::uuid4();
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $description;
        $this->ingredients = $ingredients;
        $this->ingredientsRemoved = $ingredientsRemoved;
    }
}
