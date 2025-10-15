<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::post('/register', [RegisterController::class, 'register']);
route::post('/login', [RegisterController::class, 'login']);

Route::controller(ProductController::class)->prefix('product')->group(function () {
    Route::get("/", 'list');
    Route::post("store", 'store');
    Route::get("edit/{id}", 'edit');
    Route::patch("update/{id}", 'update');
    Route::delete("delete/{id}", 'delete');
})->middleware('auth:sanctum');