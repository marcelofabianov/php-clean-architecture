<?php

namespace App\Module\User\Infra\Http;

use App\Core\Interfaces\Controller\IController;
use App\Core\Interfaces\Controller\ICreateControllerRoute;
use App\Core\Interfaces\Dto\IDto;
use App\Core\Interfaces\Repository\ICreateRepositoryUseCase;
use App\Core\Interfaces\Response\IJsonResponse;
use App\Core\Interfaces\UseCase\ICreateUseCaseHttp;
use App\Core\Shared\HttpResponse\ErrorResponse;
use App\Core\Shared\HttpResponse\SuccessResponse;
use App\Module\User\UseCase\CreateUser\CreateUserUseCase;
use ErrorException;

class CreateUserController implements IController, ICreateControllerRoute
{
    private readonly ICreateUseCaseHttp $useCase;

    /**
     * @param ICreateRepositoryUseCase $repository
     * @param IDto $dto
     */
    public function __construct(ICreateRepositoryUseCase $repository, IDto $dto)
    {
        $this->useCase = new CreateUserUseCase($repository, $dto);
    }

    /**
     * @return IJsonResponse
     */
    public function handle(): IJsonResponse
    {
        try {
            $data = $this->useCase->execute();
        } catch (ErrorException $error) {
            return ErrorResponse::create($error->getMessage(), $error->getCode());
        }
        return SuccessResponse::create($data->toArray());
    }
}