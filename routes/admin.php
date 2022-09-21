<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');

Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');

Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth:admin'],
    'as' => 'admin.'
], function(){
    // Dashboard
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

    // User
    Route::resource('users', UserController::class);

    // Pages
    Route::resource('pages', App\Http\Controllers\Admin\PageController::class);

    // Categories
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);

    // Events
    Route::resource('events', App\Http\Controllers\Admin\EventController::class);

    // Subscriptions
    Route::resource('subscriptions', \App\Http\Controllers\Admin\SubscriptionController::class);
});
