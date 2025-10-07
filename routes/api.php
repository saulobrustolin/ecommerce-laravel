<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SlugsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AddressController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('product', ProductController::class);
Route::apiResource('review', ReviewController::class);
Route::apiResource('slug', SlugsController::class);
Route::apiResource('order', OrderController::class);
Route::apiResource('image', ImageController::class);
Route::apiResource('favorite', FavoriteController::class);
Route::apiResource('address', AddressController::class);
