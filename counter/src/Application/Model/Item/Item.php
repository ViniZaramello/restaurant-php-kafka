<?php

declare(strict_types=1);

namespace App\Application\Model\Item;

use App\Application\Model\Id;

final readonly class Item
{
    public function __construct(
        public Id $id,
        public string $name,
        public int $quantity,
        public ?string $description = null,
        /**@var string[] $ingredients*/
        public array $ingredients = [],
        /**@var string[] $ingredientsRemoved*/
        public array $ingredientsRemoved = [],
        public Type $item = Type::ACTIVE
    ) {
        $this->id->generate();
    }
}
