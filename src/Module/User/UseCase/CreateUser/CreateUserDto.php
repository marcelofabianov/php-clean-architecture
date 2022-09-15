<?php

namespace App\Module\User\UseCase\CreateUser;

use App\Core\Base\UseCase\Dto;
use App\Core\Interfaces\Dto\IDto;
use App\Module\User\Domain\ValueObject\Email;
use App\Module\User\Domain\ValueObject\Password;

class CreateUserDto extends Dto implements IDto
{
    public readonly string $name;
    public readonly Email $email;
    public readonly Password $password;
    public readonly ?bool $active;

    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = Email::create($email);
        $this->password = Password::create($password);
        $this->active = true;
    }
}