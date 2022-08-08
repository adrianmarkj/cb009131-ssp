<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin'

], function(){
    // Dashboard
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // User
    Route::resource('users', UserController::class);

    // Pages
    Route::resource('pages', App\Http\Controllers\PageController::class);

    // Addresses
    Route::resource('addresses', App\Http\Controllers\AddressController::class);

    // Date
    Route::resource('dates', App\Http\Controllers\DateController::class);

    // Categories
    Route::resource('categories', App\Http\Controllers\CategoryController::class);

    // Events
    Route::resource('events', App\Http\Controllers\EventController::class);
});
