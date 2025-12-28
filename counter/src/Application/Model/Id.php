<?php

namespace App\Application\Model;

interface Id
{
    public function generate(): mixed;
}