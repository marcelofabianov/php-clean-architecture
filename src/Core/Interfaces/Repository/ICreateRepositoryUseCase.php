<?php

namespace App\Core\Interfaces\Repository;

use App\Core\Interfaces\Database\IDataStruct;
use stdClass;

interface ICreateRepositoryUseCase
{
    public function create(IDataStruct $data): IDataStruct;
}