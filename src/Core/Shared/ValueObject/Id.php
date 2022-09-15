<?php

namespace App\Core\Shared\ValueObject;

use App\Core\Exception\IdInvalidException;
use Ramsey\Uuid\Uuid;

class Id
{
    /**
     * @var string
     */
    public readonly string $value;

    /**
     * @param string|null $value
     * @throws IdInvalidException
     */
    private function __construct(string|null $value = null)
    {
        if (!is_null($value) and !Uuid::isValid($value)) {
            throw new IdInvalidException();
        }

        $this->value = $value ?? (string) Uuid::uuid4();Uuid::uuid4();
    }

    /**
     * @param string|null $value
     * @return Id
     * @throws IdInvalidException
     */
    public static function create(string|null $value = null): Id
    {
        return new Id($value);
    }
}