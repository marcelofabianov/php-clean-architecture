<?php

namespace App\Core\Interfaces\Dto;

use stdClass;

interface IDto
{
    public function toArray(): array;

    public function toStdClass(): stdClass;

    public function transformPure(): stdClass;
}