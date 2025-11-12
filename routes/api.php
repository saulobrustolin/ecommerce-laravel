<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::patch('/user/{user}', [UserController::class, 'update']);
Route::delete('/user/{user}', [UserController::class, 'delete']);

Route::get('/order/{id}', [OrderController::class, 'index']);

Route::apiResource('product', ProductController::class);
Route::apiResource('review', ReviewController::class);
Route::apiResource('order', OrderController::class);
Route::apiResource('image', ImageController::class);
Route::apiResource('favorite', FavoriteController::class);
Route::apiResource('address', AddressController::class);
Route::apiResource('collection', CollectionController::class);

Route::get('/cart/{user}', [CartController::class, 'show'])->name('cart.show');
Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::patch('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
