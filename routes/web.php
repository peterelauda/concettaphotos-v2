<?php

use App\Http\Controllers\ConcettalkController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

Route::post('/concettalk/{id}/like', [ConcettalkController::class, 'toggleLike'])
    ->middleware('throttle:concettalk-like');

Route::post('/concettalk/comment', [ConcettalkController::class, 'storeComment'])
    ->middleware('throttle:concettalk-comment');

require __DIR__ . '/settings.php';
