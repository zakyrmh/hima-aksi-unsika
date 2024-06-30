<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\MemberCategory;

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

    public function about()
    {
        $categories = MemberCategory::with('members')->get();

        // Urutan manual yang diinginkan
        $desiredOrder = ['Badan Pengurus Harian', 'Bidang Pendidikan', 'Bidang Penelitian & Pengembangan', 'Bidang Pengabdian'];

        // Mengurutkan MemberCategory sesuai urutan manual
        $categories = $categories->sortBy(function ($category) use ($desiredOrder) {
            return array_search($category->title, $desiredOrder);
        });

        return view('website.pages.about', [
            'title' => 'About',
            'categories' => $categories
        ]);
    }
}