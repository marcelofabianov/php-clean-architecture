<?php

namespace App\Module\User\Exception;

use ErrorException;

class InvalidEmailException extends ErrorException
{
    public function __construct()
    {
        parent::__construct('Email informado não tem um formato válido!');
    }
}