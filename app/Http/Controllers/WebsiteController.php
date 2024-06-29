<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WebsiteController extends Controller
{
    public function home()
    {
        $posts = Post::where('status', 1)->get();

        foreach ($posts as $post) {
            $post->date = Carbon::parse($post->date)->translatedFormat('d F Y');
        }

        return view('website.pages.home', [
            'title' => 'Home',
            'posts' => $posts
        ]);
    }

    public function blog()
    {
        $posts = Post::where('status', 1)->get();

        foreach ($posts as $post) {
            $post->date = Carbon::parse($post->date)->translatedFormat('d F Y');
        }

        return view('website.pages.blog', [
            'title' => 'Blog',
            'posts' => $posts
        ]);
    }
}