<?php

namespace App\Module\User\Domain\ValueObject;

class Email
{
    public readonly string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function create(string $value): Email
    {
        return new Email($value);
    }
}