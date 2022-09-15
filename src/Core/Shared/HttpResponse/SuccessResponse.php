<?php

namespace App\Core\Shared\HttpResponse;

use App\Core\Interfaces\Response\IJsonResponse;

class SuccessResponse implements IJsonResponse
{
    private readonly array $body;

    /**
     * @param array $data
     * @param string|null $message
     * @param int|null $statusCode
     */
    private function __construct(array $data = [], string $message = null, int $statusCode = null)
    {
        $this->body = [
            'status' => [
                'type' => 'success',
                'message' => $message ?? 'It worked out!',
                'statusCode' => $statusCode ?? StatusCode::HTTP_OK
            ],
            'data' => $data,
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
     * @param array $data
     * @param string|null $message
     * @param int|null $statusCode
     * @return SuccessResponse
     */
    public static function create(array $data = [], string $message = null, int $statusCode = null): SuccessResponse
    {
        if (!StatusCode::isValidCode($statusCode)) {
            $statusCode = StatusCode::HTTP_OK;
        }

        return new SuccessResponse($data, $message, $statusCode);
    }
}