<?php

namespace App\Module\User\Infra\Repository;

use App\Core\Base\Repository\ARepository;
use App\Core\Exception\DateInvalidFormatException;
use App\Core\Exception\IdInvalidException;
use App\Core\Interfaces\Database\IDataStruct;
use App\Core\Interfaces\Repository\IRepository;
use App\Core\Shared\ValueObject\CreatedAt;
use App\Core\Shared\ValueObject\DeletedAt;
use App\Core\Shared\ValueObject\Id;
use App\Core\Shared\ValueObject\UpdatedAt;
use App\Module\User\Domain\UserData;
use App\Module\User\Domain\ValueObject\Email;
use App\Module\User\Domain\ValueObject\Password;
use stdClass;

class UserRepository extends ARepository implements IRepository
{
    /**
     * @param stdClass $record
     * @return IDataStruct
     * @throws IdInvalidException
     * @throws DateInvalidFormatException
     */
    public function data(stdClass $record): IDataStruct
    {
        return new UserData(
            Id::create(),
            $record->name,
            Email::create($record->email),
            Password::create($record->password), // encrypt
            $record->active,
            CreatedAt::create(),
            UpdatedAt::create(),
            DeletedAt::create()
        );
    }
}