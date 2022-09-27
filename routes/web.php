<?php

use Illuminate\Support\Facades\Route;
use App\Models\Finance\Subscription;

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

Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

Route::get('/event/{url}', App\Http\Controllers\EventController::class)->name('events.show');

Route::get('/category/{id}', App\Http\Controllers\CategoryController::class)->name('categories.show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:web'])
 ->get('/reservation/{event}', [App\Http\Controllers\ReservationController::class, 'show'])
 ->name('reservation.show');

Route::middleware(['auth:web'])
 ->post('/reservation/{event}', [App\Http\Controllers\ReservationController::class, 'reserve'])
 ->name('reservation.reserve');

Route::middleware(['auth:web'])
 ->get('/reservations', [App\Http\Controllers\ReservationController::class, 'index'])
 ->name('reservation.index');

Route::middleware(['auth:web'])
 ->get('/profile/{user}', [App\Http\Controllers\UserController::class, 'show'])
 ->name('profile.show');

Route::middleware(['auth:web'])
 ->get('/profile/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])
 ->name('profile.edit');

Route::middleware(['auth:web'])
 ->post('/profile/update/{user}', [App\Http\Controllers\UserController::class, 'update'])
 ->name('profile.update');

Route::get('/archive', [App\Http\Controllers\ArchiveController::class, 'index'])->name('archive');

Route::get('{url}', App\Http\Controllers\PageController::class)->name('pages.show');
