<?php

namespace App\Core\Base\UseCase;

use stdClass;

class Dto
{
    public function toArray(): array
    {
        return (array) $this;
    }

    public function toStdClass(): stdClass
    {
        return (object) ((array) $this);
    }

    public function transformPure(): stdClass
    {
        //
    }
}