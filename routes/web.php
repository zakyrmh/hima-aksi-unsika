<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardHomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
    Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
    Route::post('/authentication', [AuthController::class, 'authentication'])->name('authentication');
    Route::post('/store', [AuthController::class, 'store'])->name('store');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});

route::get('/dashboard', [DashboardHomeController::class, 'index'])->name('dashboard.home')->middleware('auth');