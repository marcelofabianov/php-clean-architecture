<?php

namespace App\Core\Exception;

use ErrorException;

class ActivitiesLogException extends ErrorException
{
    public function __construct(string $target)
    {
        parent::__construct($target.": erro na tentativa de capturar o evento");
    }
}