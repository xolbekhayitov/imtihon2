<?php

use App\Http\Controllers\Web\ServiceController;
use App\Http\Controllers\Web\BookController;
use App\Http\Controllers\Web\VenueController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('services', ServiceController::class);
Route::resource('venues', VenueController::class);
Route::resource('books', BookController::class);

