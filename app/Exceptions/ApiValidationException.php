<?php

namespace App\Exceptions;

use App\Enums\Responses\ErrorEnum;
use Exception;

class ApiValidationException extends Exception
{
    /**
     * @param array $errors
     * @param string $frontendCode
     *
     * @throws  ApiErrorException
     */

    public function __construct(array $errors, string $frontendCode = 'validation_error')
    {
        throw new ApiErrorException(
            $frontendCode,
            ErrorEnum::VALIDATION_ERROR,
            'Ошибка валидации',
            422,
            $errors
        );

    }
}
