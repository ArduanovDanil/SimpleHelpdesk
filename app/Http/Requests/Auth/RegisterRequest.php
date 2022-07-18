<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\PublicRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends PublicRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8),
            ],
            'password_confirmation' => 'required',
        ];
    }
}
