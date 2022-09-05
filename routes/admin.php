<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'type:admin'],
    'as' => 'admin.'
], function(){
    // Dashboard
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

    // User
    Route::resource('users', UserController::class);

    // Pages
    Route::resource('pages', App\Http\Controllers\Admin\PageController::class);

    // Addresses
    Route::resource('addresses', App\Http\Controllers\Admin\AddressController::class);

    // Date
    Route::resource('dates', App\Http\Controllers\Admin\DateController::class);

    // Categories
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);

    // Events
    Route::resource('events', App\Http\Controllers\Admin\EventController::class);
});
