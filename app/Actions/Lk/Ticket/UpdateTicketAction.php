<?php

namespace App\Actions\Lk\Ticket;

use App\Actions\AbstractAction;
use App\Enums\Responses\ErrorEnum;
use App\Exceptions\ApiErrorException;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;

class UpdateTicketAction extends AbstractAction
{

    /**
     * @param array $requestData
     * @param Ticket $ticket
     * @return Model
     * @throws ApiErrorException
     */
    public function handle(array $requestData, Ticket $ticket): Model
    {

        try {
            $ticket = tap($ticket)->update($requestData);
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
