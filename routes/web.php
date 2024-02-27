<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

// kita atur juga untuk middleware menggunakan group pada routing
// didalamnya terdapat group untuk mengecek kondisi login
// jika user yang login merupakan admin maka akan diarahkan ke AdminController
// jika user yang login merupakan user biasa maka akan diarahkan ke UserController
// Route::group(['middleware' => ['auth']], function () {
//     Route::group(['middleware' => ['cek_login:admin']], function () {
//         Route::resource('admin', AdminController::class);
//     });
//     Route::group(['middleware' => ['cek_login:user']], function () {
//         Route::resource('user', UserController::class);
//     });
// });