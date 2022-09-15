<?php

namespace App\Module\User\Exception;

use ErrorException;

class EmailInUsoException extends ErrorException
{
    public function __construct()
    {
        parent::__construct('Email já está cadastrado');
    }
}