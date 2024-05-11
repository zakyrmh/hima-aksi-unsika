<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard/pages/dashboard',[
        'title' => 'Dashboard'
        ]);
});
Route::get('/post', function () {
    return view('dashboard/pages/posts/index',[
        'title' => 'Posts'
        ]);
});