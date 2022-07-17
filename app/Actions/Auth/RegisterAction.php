<?php

namespace App\Actions\Auth;

use App\Actions\AbstractAction;
use App\Enums\Responses\ErrorEnum;
use App\Exceptions\ApiErrorException;
use App\Models\User;

class RegisterAction extends AbstractAction
{
    public function handle($requestData)
    {

        try {
            User::create($requestData);
        } catch (\Throwable $e) {
            throw new ApiErrorException(
                'unexpected_error',
                ErrorEnum::UNEXPECTED_ERROR,
                'Возникла непредвиденная ошибка',
                404,
                []
            );
        }

    }

}
