<?php

namespace App\Actions\Lk\Ticket;

use App\Actions\AbstractAction;
use App\Enums\Responses\ErrorEnum;
use App\Exceptions\ApiErrorException;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;

class CreateTicketAction extends AbstractAction
{

    /**
     * @param array $requestData
     * @return Model
     * @throws ApiErrorException
     */
    public function handle(array $requestData): Model
    {

        try {
            $ticket = Ticket::create($requestData);
        } catch (\Throwable $e) {
            throw new ApiErrorException(
                'unexpected_error',
                ErrorEnum::UNEXPECTED_ERROR,
                'Возникла непредвиденная ошибка',
                404,
                []
            );
        }

        return $ticket;

    }

}
