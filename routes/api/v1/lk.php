<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Lk\TicketsController;


Route::prefix('lk')->middleware('auth:sanctum')->group(function (){
    /** CRUD для обращений */
    Route::resource('tickets', TicketsController::class)->except([
        'create', 'edit',
    ]);

});

