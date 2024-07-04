<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Cabinet;
use Illuminate\Http\Request;
use App\Models\MemberCategory;
use Illuminate\Routing\Controller;

class WebsiteController extends Controller
{
    public function home()
    {
        $posts = Post::where('status', 1)->get();

        foreach ($posts as $post) {
            $post->date = Carbon::parse($post->date)->translatedFormat('d F Y');
        }

        $cabinets = Cabinet::where('status', 1)->get();

        return view('website.pages.home', [
            'title' => 'Home',
            'posts' => $posts,
            'cabinets' => $cabinets
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

    public function about()
    {
        $categories = MemberCategory::with('members')->get();

        $categoriesByPeriod = $categories->groupBy('period');
        $latestPeriod = $categoriesByPeriod->keys()->max();

        return view('website.pages.about', [
            'title' => 'About',
            'categoriesByPeriod' => $categoriesByPeriod,
            'latestPeriod' => $latestPeriod
        ]);
    }

    public function showBlog($link)
    {
        // Mencari postingan berdasarkan link
        $post = Post::where('link', $link)->firstOrFail();

        // Mengirim data ke view
        return view('website.pages.showblog', [
            'title' => 'Show Blog',
            'post' => $post,
            'posts' => Post::all()
        ]);
    }

}