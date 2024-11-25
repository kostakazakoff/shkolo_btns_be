<?php

use App\Http\Controllers\ButtonsController;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(ButtonsController::class)
    ->prefix('/buttons')
    // ->middleware('cors')
    ->group(function () {
        Route::get('/', 'list');
        Route::get('/{id}', 'show');
        Route::post('/{id}/update', 'update');
        Route::post('/{id}/clear', 'clear');
    });