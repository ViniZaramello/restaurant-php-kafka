<?php

namespace App\Application\Model\Product;

enum Type: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
}
