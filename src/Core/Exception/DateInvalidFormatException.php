<?php

namespace App\Core\Exception;

class DateInvalidFormatException extends \ErrorException
{
    public function __construct(string $fieldDate)
    {
        parent::__construct($fieldDate.": Não foi possível criar a data com o formato desejado");
    }
}