<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublishController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/publish', [PublishController::class, 'index'])->name('publish.index');
Route::get('/publish/store', [PublishController::class, 'index'])->name('publish.store');

Route::get('/favorites', function () {
    return view('website/favorites');
});
