<?php

namespace App\Core\Interfaces\Response;

interface IJsonResponse
{
    public function json(string $message, int $statusCode): string;
}