<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicationController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/publish', [PublicationController::class, 'index'])->name('publish.index');
Route::post('/publish/store', [PublicationController::class, 'store'])->name('publish.store');

Route::get('/favorites', function () {
    return view('website/favorites');
});

Route::get('/login', function () {
    return view('website/user/login');
});
