<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIs\ClientController;


Route::prefix('client')->group(function(){
    Route::get('/', [ClientController::class, 'index']);
    Route::post('/', [ClientController::class, 'store']);
    Route::get('/{id}', [ClientController::class, 'show']);
    Route::post('update/{id}', [ClientController::class, 'update']);
    Route::get('destroy/{id}', [ClientController::class, 'destroy']);
});
