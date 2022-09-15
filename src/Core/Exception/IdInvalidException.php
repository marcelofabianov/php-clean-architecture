<?php

declare(strict_types=1);

namespace App\Core\Exception;

use ErrorException;

class IdInvalidException extends ErrorException
{
    public function __construct()
    {
        parent::__construct('Id informado não é um UUID v4 válido', 422);
    }
}