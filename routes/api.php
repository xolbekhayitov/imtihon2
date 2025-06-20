<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\BookController;
use App\Http\Controllers\Api\V1\VenueController;
use App\Http\Controllers\Api\V1\ServiceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::apiResource('services', ServiceController::class);
    Route::apiResource('books', BookController::class);
    Route::apiResource('venues', VenueController::class);
});


