<?php

namespace App\Core\Interfaces\UseCase;

use App\Core\Interfaces\Database\IDataStruct;
use App\Core\Interfaces\Dto\IDto;
use App\Core\Interfaces\Repository\ICreateRepositoryUseCase;

interface ICreateUseCaseHttp
{
    public function __construct(ICreateRepositoryUseCase $repository, IDto $dto);

    public function execute(): IDataStruct;
}