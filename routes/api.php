<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::post('/register', [RegisterController::class, 'register']);
route::post('/login', [RegisterController::class, 'login']);

