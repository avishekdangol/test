<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::get('/login', [AdminController::class, 'showLoginForm']);
        Route::post('/login', [AdminController::class, 'login'])->name('login');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/home', [AdminController::class, 'index'])->name('home');
    });
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/welcome', function () {
    if (Auth::user()) return redirect('/');
    else return view('welcome');
});
