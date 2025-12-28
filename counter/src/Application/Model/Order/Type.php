<?php

namespace App\Application\Model\Order;

enum Type: string
{
    case CREATED = 'created';
    case RECEIVED = 'received';
    case FINISHED = 'finished';
    case CANCELED = 'canceled';
}
