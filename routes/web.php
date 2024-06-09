<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberCategoryController;

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

    Route::get('/profile', function () {
        return view('dashboard/pages/profile/index', [
            'title' => 'Edit Profile'
        ]);

    });

    Route::resource('/dashboard/posts', PostController::class);

    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/dashboard/users', [UserController::class, 'index']);
        Route::resource('/dashboard/members', MemberController::class);
    });
});