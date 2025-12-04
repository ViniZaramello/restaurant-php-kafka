<?php

namespace App\Driver\Http\CreateOrder;

final readonly class ItemRequest
{
    public function __construct(
        public string $id,
        public string $quantity,
        public array $ingredientsRemove
    ){
    }
}