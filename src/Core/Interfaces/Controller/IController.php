<?php

namespace App\Core\Interfaces\Controller;

use App\Core\Interfaces\Response\IJsonResponse;

interface IController
{
    public function handle(): IJsonResponse;
}