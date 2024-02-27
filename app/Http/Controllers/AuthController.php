<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.pages.login', [
            'title' => 'Login - Hima Aksi UNSIKA'
        ]);
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('failed', 'These credentials does not match our records');
    }

    public function register()
    {
        return view('auth.pages.register', [
            'title' => 'Register - Hima Aksi'
        ]);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        $validator['role'] = 'user';
        $validator['password'] = bcrypt($validator['password']);

        User::create($validator);
        $request->session()->flash('success', 'Registration successful! Please login');
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        Auth::logout();
        return Redirect('login');
    }
}