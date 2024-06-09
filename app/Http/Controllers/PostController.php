<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('dashboard.pages.posts.index', [
            'title' => 'Posts',
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.posts.create', [
            'title' => 'Create Post'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'category' => 'required|string',
            'date' => 'nullable|string',
            'status' => 'nullable|string',
            'body' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Mengonversi status
        $status = $request->has('status') && $request->input('status') === 'on' ? '1' : '0';

        // Menyimpan image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/images'), $imageName);
            $imagePath = 'assets/images/' . $imageName;
        }

        // Simpan post
        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'category' => $request->category,
            'date' => $request->date,
            'status' => $status,
            'body' => $request->body,
            'image' => $imagePath,
        ]);

        // Redirect atau respons sesuai kebutuhan aplikasi
        return redirect()->route('posts.index')->with('success', 'New post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}