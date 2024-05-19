<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('website/pages/home');
});

Route::get('/blog', function () {
    return view('website/pages/blog');
});

Route::get('/about', function () {
    return view('website/pages/about');
});

Route::get('/contact', function () {
    return view('website/pages/contact');
});

//

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard/edit-profile', function () {
        return view('dashboard/pages/profile/index')
    });
    Route::get('/post', function () {
    return view('dashboard/pages/posts/index', [
        'title' => 'Posts'
    ]);
});
});

Route::controller(UserController::class)->group(function () {
    Route::get('/dashboard/users', 'index');
});