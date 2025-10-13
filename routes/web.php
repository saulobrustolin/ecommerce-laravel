<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('home');
})->name('home');

Route::middleware(['collection'])->group(function () {
    Route::get('/collection/{slug}', function ($slug) {
        return Inertia::render('collection', [
            'slug' => $slug,
        ]);
    })->name('collection');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

    Route::get('profile', function () {
        return Inertia::render('profile/profile');
    })->name('profile');

    Route::get('profile/pedidos', function () {
        return Inertia::render('profile/pedidos');
    })->name('profile.pedidos');

    Route::get('profile/edit', function () {
        return Inertia::render('profile/edit');
    })->name('profile.edit');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
