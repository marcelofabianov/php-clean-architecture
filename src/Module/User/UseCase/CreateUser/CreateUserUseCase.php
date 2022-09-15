<?php

namespace App\Module\User\UseCase\CreateUser;

use App\Core\Exception\DateInvalidFormatException;
use App\Core\Exception\IdInvalidException;
use App\Core\Interfaces\Database\IDataStruct;
use App\Core\Interfaces\Dto\IDto;
use App\Core\Interfaces\Repository\ICreateRepositoryUseCase;
use App\Core\Interfaces\UseCase\ICreateUseCaseHttp;
use App\Core\Interfaces\UseCase\IUseCase;
use App\Core\Shared\ValueObject\CreatedAt;
use App\Core\Shared\ValueObject\DeletedAt;
use App\Core\Shared\ValueObject\Id;
use App\Core\Shared\ValueObject\UpdatedAt;
use App\Module\User\Domain\UserData;

class CreateUserUseCase implements IUseCase, ICreateUseCaseHttp
{
    private readonly ICreateRepositoryUseCase $repository;
    private readonly CreateUserDto $dto;

    /**
     * @param ICreateRepositoryUseCase $repository
     * @param IDto $dto
     */
    public function __construct(ICreateRepositoryUseCase $repository, IDto $dto)
    {
        $this->repository = $repository;
        $this->dto = $dto;
    }

    /**
     * @return IDataStruct
     * @throws DateInvalidFormatException
     * @throws IdInvalidException
     */
    public function execute(): IDataStruct
    {
        $data = new UserData(
            Id::create(),
            $this->dto->name,
            $this->dto->email,
            $this->dto->password, // encrypt
            $this->dto->active,
            CreatedAt::create(),
            UpdatedAt::create(),
            DeletedAt::create()
        );

        return $this->repository->create($data);
    }
}