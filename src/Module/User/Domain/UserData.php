<?php

namespace App\Module\User\Domain;

use App\Core\Base\Database\DataStruct;
use App\Core\Exception\DateInvalidFormatException;
use App\Core\Interfaces\Database\IDataStruct;
use App\Core\Shared\ValueObject\CreatedAt;
use App\Core\Shared\ValueObject\DeletedAt;
use App\Core\Shared\ValueObject\Id;
use App\Core\Shared\ValueObject\UpdatedAt;
use App\Module\User\Domain\ValueObject\Email;
use App\Module\User\Domain\ValueObject\Password;

class UserData extends DataStruct implements IDataStruct
{
    public readonly string $id;
    public readonly string $name;
    public readonly string $email;
    public readonly string $password;
    public readonly bool $active;
    public readonly string $createdAt;
    public readonly string $updatedAt;
    public readonly string $deletedAt;

    /**
     * @throws DateInvalidFormatException
     */
    public function __construct(
        Id $id,
        string $name,
        Email $email,
        Password $password,
        bool $active,
        CreatedAt $createdAt,
        UpdatedAt $updatedAt,
        DeletedAt $deletedAt
    ) {
        $this->id = $id->value;
        $this->name = $name;
        $this->email = $email->value;
        $this->password = $password->value;
        $this->active = $active;
        $this->createdAt = $createdAt->format();
        $this->updatedAt = $updatedAt->format();
        $this->deletedAt = $deletedAt->format();
    }
}