<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dev', function () {
    // $admin = \App\Models\Auth\User::create([
    //     'name' => 'Administartor',
    //     'email' => rand(0, 100).'admin@admin.com',
    //     'email_verified_at' => now(),
    //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    //     'remember_token' => \Illuminate\Support\Str::random(10),
    //     'first_name' => 'John',
    //     'last_name' => 'Doe',
    //     'type' => 'admin',
    // ]);

    // dd($admin);

    // $user = (new \App\Models\Auth\User)->where('type', 'admin')->first();
    // debug($user);
    // dd(resolve('cb009131_ssp'));
    return view('home');
});

Route::get('/event/{url}', App\Http\Controllers\EventController::class)->name('event.show');

Route::get('{url}', App\Http\Controllers\PageController::class)->name('page.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
