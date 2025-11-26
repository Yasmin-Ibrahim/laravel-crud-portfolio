<?php

use App\Http\Controllers\APIs\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIs\ClientController;
use App\Http\Controllers\APIs\MessageController;

// register & login
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware("auth:sanctum")->group(function(){
    // logout
    Route::post('logout', [AuthController::class, 'logout']);

    Route::prefix('client')->group(function(){
        Route::get('/', [ClientController::class, 'index']);
        Route::post('/', [ClientController::class, 'store']);
        Route::get('/{id}', [ClientController::class, 'show']);
        Route::post('update/{id}', [ClientController::class, 'update']);
        Route::get('destroy/{id}', [ClientController::class, 'destroy']);
    });
});


// form message
Route::post('/message', [MessageController::class, 'store']);
