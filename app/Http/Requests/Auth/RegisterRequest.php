<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\PublicRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends PublicRequest
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
