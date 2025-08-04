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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductDetailsController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/home', [HomeController::class, 'index']);

Route::get('/category/{name}', [CategoryController::class, 'index'])->name('product-category.index');

Route::get('/product/{slug}', [ProductDetailsController::class, 'index'])->name('product-details.index');

Route::get('/highlights', [HighlightController::class, 'index'])->name('highlights.index');

Route::middleware('authenticated')->group(function() {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::delete('/profile/delete', [ProfileController::class, 'delete'])->name('profile.delete');

    Route::get('/my-products', [MyProductsController::class, 'index'])->name('my-products.index');
    Route::delete('my-products/delete/{product}', [MyProductsController::class, 'delete'])->name('my-products.delete');

    Route::get('/publish', [PublicationController::class, 'index'])->name('publish.index');
    Route::post('/publish/store', [PublicationController::class, 'store'])->name('publish.store');

    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('favorites/{product}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
});

Route::middleware('admin')->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin-dashboard.index');
    Route::post('/admin/dashboard/createRule', [AdminController::class, 'createRule'])->name('admin-dashboard.create-rule');
    Route::delete('/admin/dashboard/deleteRule', [AdminController::class, 'deleteRule'])->name('admin-dashboard.delete-rule');
    Route::post('/admin/dashboard/assignUserRule', [AdminController::class, 'assignUserRule'])->name('admin-dashboard.assign-user-rule');
    Route::post('/admin/dashboard/removeUserRule', [AdminController::class, 'removeUserRule'])->name('admin-dashboard.remove-user-rule');

    Route::delete('/home/delete/{product}', [HomeController::class, 'delete'])->name('home.delete'); // Admin can delete any product on home page
});

Route::middleware('guest')->group(function() {
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.register');

    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/auth', [LoginController::class, 'login'])->name('loggingin');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
