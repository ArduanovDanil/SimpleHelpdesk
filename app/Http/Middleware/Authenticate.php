<?php

namespace App\Http\Middleware;

use App\Enums\Responses\ErrorEnum;
use App\Exceptions\ApiErrorException;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        $user = $request->user('sanctum');

        if(! $user){
            throw new ApiErrorException(
                'unauthorized_user',
                ErrorEnum::UNAUTHORIZED,
                'Пользователь не авторизован',
                401,
                [],
            );
        }

        return $next($request);
    }

}
