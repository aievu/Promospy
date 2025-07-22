<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MyProductsController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HighlightController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/home', [HomeController::class, 'index']);

Route::get('/highlights', [HighlightController::class, 'index'])->name('highlights.index');

Route::middleware('authenticated')->group(function() {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/my-products', [MyProductsController::class, 'index'])->name('my-products.index');
    Route::delete('my-products/delete/{id}', [MyProductsController::class, 'delete'])->name('my-products.delete');

    Route::get('/publish', [PublicationController::class, 'index'])->name('publish.index');
    Route::post('/publish/store', [PublicationController::class, 'store'])->name('publish.store');

    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('favorites/{product}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
});


Route::middleware('guest')->group(function() {
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.register');

    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/auth', [LoginController::class, 'login'])->name('loggingin');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
