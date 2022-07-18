<?php

namespace App\Http\Requests\Lk\Tickets;

use App\Http\Requests\Lk\LkRequest;

class CreateTicketRequest extends LkRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ];
    }
}
