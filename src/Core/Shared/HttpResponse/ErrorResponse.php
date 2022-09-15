<?php

namespace App\Core\Shared\HttpResponse;

use App\Core\Interfaces\Response\IJsonResponse;

class ErrorResponse implements IJsonResponse
{
    private readonly array $body;

    /**
     * @param string $message
     * @param int $statusCode
     */
    private function __construct(string $message, int $statusCode)
    {
        $this->body = [
            'status' => [
                'type' => 'error',
                'message' => $message,
                'statusCode' => $statusCode
            ],
            'data' => [],
        ];
    }

    /**
     * @param string $message
     * @param int $statusCode
     * @return string
     */
    public function json(string $message, int $statusCode): string
    {
        return json_encode($this->body);
    }

    /**
     * @param string $message
     * @param int $statusCode
     * @return ErrorResponse
     */
    public static function create(string $message, int $statusCode): ErrorResponse
    {
        if (!StatusCode::isValidCode($statusCode)) {
            $statusCode = StatusCode::HTTP_INTERNAL_SERVER_ERROR;
        }

        return new ErrorResponse($message, $statusCode);
    }
}