<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\AuthenticateAction;
use App\Actions\Auth\RegisterAction;
use App\Exceptions\ApiErrorException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthenticateRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Traits\ResponderTrait;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    use ResponderTrait;

    /**
     * @param RegisterRequest $request
     * @return Response
     * @throws ApiErrorException|Exception
     */
    public function register(RegisterRequest $request): Response
    {

        $requestData = $request->validated();

        app(RegisterAction::class)->handle($requestData);

        return response()->noContent(201);

    }

    /**
     * @param AuthenticateRequest $request
     * @return JsonResponse
     * @throws ApiErrorException|Exception
     */

    public function authenticate(AuthenticateRequest $request): JsonResponse
    {

        $requestData = $request->validated();

        $accessToken = app(AuthenticateAction::class)->handle($requestData);

        return self::arrayResponse(['access_token' => $accessToken]);

    }

}
