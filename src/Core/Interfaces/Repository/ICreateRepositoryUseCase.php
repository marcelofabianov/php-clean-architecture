<?php

namespace App\Core\Interfaces\Repository;

use App\Core\Interfaces\Database\IDataStruct;
use stdClass;

interface ICreateRepositoryUseCase
{
    public function data(stdClass $record): IDataStruct;

    public function save(IDataStruct $data): IDataStruct;
}