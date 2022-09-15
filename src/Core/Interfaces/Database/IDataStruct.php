<?php

namespace App\Core\Interfaces\Database;

use stdClass;

interface IDataStruct
{
    public function toArray(): array;

    public function toStdClass(): stdClass;

    public function toJson(): string;
}