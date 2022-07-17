<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class ApiErrorException extends Exception
{
    /**
     * @var string
     */
    private string $frontendCode;

    /**
     * @var int
     */
    private int $internalCode;

    /**
     * @var int
     */
    private int $http;

    /**
     * @var array
     */
    private array $errors;

    /**
     * @param string $frontendCode
     * @param int $internalCode
     * @param string $message
     * @param int $http
     * @param array $errors
     */
    public function __construct(string $frontendCode, int $internalCode, string $message, int $http, array $errors)
    {

        $this->frontendCode = $frontendCode;
        $this->internalCode = $internalCode;
        $this->message = $message;
        $this->http = $http;
        $this->errors = $errors;
    }

    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        $response = [
            'code' => $this->frontendCode,
            'message' => $this->message,
            'errors' => $this->errors,
            'internal_code' => $this->internalCode,
        ];

        return response()->json($response, $this->http);
    }
}
