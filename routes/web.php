<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/home', [HomeController::class, 'index']);

Route::middleware('authentication')->group(function() {
    Route::get('/publish', [PublicationController::class, 'index'])->name('publish.index');
    Route::post('/publish/store', [PublicationController::class, 'store'])->name('publish.store');

    Route::get('/favorites', function () {
        return view('website/favorites');
    });
});


Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'register'])->name('register.register');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/auth', [LoginController::class, 'login'])->name('loggingin');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
