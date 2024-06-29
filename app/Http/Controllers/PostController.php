<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan user yang sedang login
        $user = auth()->user();

        // Memfilter post berdasarkan user id atau role
        if ($user->role == 'admin') {
            $posts = Post::all();
        } else {
            $posts = Post::where('user_id', $user->id)->get();
        }

        // Mengubah status menjadi teks "Posted" atau "Draft"
        $posts->each(function ($post) {
            $post->status_text = $post->status == 1 ? 'Posted' : 'Draft';
        });

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
            'title' => 'Posts'
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
            'link' => 'string',
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

        // Membuat link
        $link = strtolower($request->title);
        $link = str_replace(' ', '-', $link);
        $link = preg_replace('/[^a-z0-9\-]/', '', $link);
        $link = preg_replace('/-+/', '-', $link);

        // Simpan post
        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'category' => $request->category,
            'date' => $request->date,
            'status' => $status,
            'body' => $request->body,
            'link' => $link,
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
        return view("dashboard.pages.posts.show", [
            'title' => 'Posts',
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("dashboard.pages.posts.edit", [
            'title' => 'Posts',
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'category' => 'required|string',
            'date' => 'nullable|string',
            'status' => 'nullable|string',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $status = $request->has('status') && $request->input('status') === 'on' ? '1' : '0';

        $imagePath = $post->image;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($imagePath) {
                if (file_exists(public_path($imagePath))) {
                    unlink(public_path($imagePath));
                }
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/images'), $imageName);
            $imagePath = 'assets/images/' . $imageName;
        }

        $post->update([
            'title' => $request->title,
            'category' => $request->category,
            'date' => $request->date,
            'status' => $status,
            'body' => $request->body,
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Hapus foto jika ada
        if ($post->image) {
            $filePath = public_path($post->image);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        // Hapus post dari database
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}