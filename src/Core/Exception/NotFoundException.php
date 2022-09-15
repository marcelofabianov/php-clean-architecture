<?php

namespace App\Core\Exception;

use ErrorException;

class NotFoundException extends ErrorException
{
    public function __construct(string $target) {
        $message = $target.' not found!';
        parent::__construct($message, 404);
    }
}