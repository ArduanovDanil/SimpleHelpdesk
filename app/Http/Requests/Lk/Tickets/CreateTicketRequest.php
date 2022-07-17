<?php

namespace App\Http\Requests\Lk\Tickets;

use App\Http\Requests\PublicRequest;

class CreateTicketRequest extends PublicRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

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
