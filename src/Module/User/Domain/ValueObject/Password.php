<?php

namespace App\Module\User\Domain\ValueObject;

class Password
{
    public readonly string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function create(string $value): Password
    {
        return new Password($value);
    }
}