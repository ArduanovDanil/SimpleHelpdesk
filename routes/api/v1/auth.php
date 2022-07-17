<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


Route::prefix('auth')->group(function (){
    /** Регистрация пользователя */
    Route::post('register', [AuthController::class, 'register']);

    /** Аутентификация пользователя */
    Route::post('authenticate', [AuthController::class, 'authenticate']);
});

