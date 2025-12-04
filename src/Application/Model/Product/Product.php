<?php

declare(strict_types=1);

namespace App\Application\Model\Product;

use App\Application\Model\Id;
use Ramsey\Uuid\Uuid;

final readonly class Product
{
    public function __construct(
        public Id $id,
        public string $name,
        public float $price,
        public ?string $description = null,
        /**@var string[] $ingredients*/
        public array $ingredients = [],
        public Type $item = Type::ACTIVE
    ) {
        $this->id->generate();
    }
}
