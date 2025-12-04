<?php

namespace App\Driven;

use App\Application\Model\Id;
use Ramsey\Uuid\Uuid;

class IdAdapter implements Id
{
    public function generate(): mixed
    {
        return Uuid::uuid4()->toString();
    }
}
