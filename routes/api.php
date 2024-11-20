<?php

use App\Http\Controllers\ButtonsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/buttons', [ButtonsController::class, 'list']);
Route::get('/buttons/{id}', [ButtonsController::class, 'show']);
Route::post('/buttons/{id}/update', [ButtonsController::class, 'update']);
Route::post('/buttons/{id}/clear', [ButtonsController::class, 'clear']);