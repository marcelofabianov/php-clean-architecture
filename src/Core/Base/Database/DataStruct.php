<?php

namespace App\Core\Base\Database;

use stdClass;

class DataStruct
{
    public function toArray(): array
    {
        return (array) $this;
    }

    public function toStdClass(): stdClass
    {
        return (object) ((array) $this);
    }

    public function toJson(): string
    {
        $data = $this->toArray();
        return json_encode($data);
    }
}