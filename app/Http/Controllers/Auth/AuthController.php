<?php

namespace App\Http\Controllers\Auth;


use App\Actions\Auth\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {

        $requestData = $request->validated();

        app(RegisterAction::class)->handle($requestData);

        return response()->noContent(201);

    }

}
