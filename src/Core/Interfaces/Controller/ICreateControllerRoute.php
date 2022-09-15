<?php

namespace App\Core\Interfaces\Controller;

use App\Core\Interfaces\Dto\IDto;
use App\Core\Interfaces\Repository\ICreateRepositoryUseCase;
use App\Core\Interfaces\Response\IJsonResponse;

interface ICreateControllerRoute
{
    public function __construct(ICreateRepositoryUseCase $repository, IDto $dto);

    public function handle(): IJsonResponse;
}