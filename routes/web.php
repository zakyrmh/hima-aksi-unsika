<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberCategoryController;

Route::get('/', [WebsiteController::class, 'home'])->name('website.home');
Route::get('/blog', [WebsiteController::class, 'blog'])->name('website.blog');
Route::get('/blog/{link}', [WebsiteController::class, 'showBlog'])->name('website.blogshow');
Route::get('/about', [WebsiteController::class, 'about'])->name('website.about');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact/create', [ContactController::class, 'store'])->name('contact.store');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/register', [AuthController::class, 'register'])->name('register');
        Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    });

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('/dashboard/posts', PostController::class);

    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/dashboard/users', [UserController::class, 'index']);
        Route::resource('/dashboard/member-categories', MemberCategoryController::class);
        Route::resource('/dashboard/members', MemberController::class);
        Route::resource('/dashboard/cabinets', CabinetController::class);
        Route::resource('/dashboard/messages', MessageController::class);
    });
});