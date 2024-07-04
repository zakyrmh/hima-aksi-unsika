<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Member;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $postCount = Post::where('status', 1)->count();
        $memberCount = Member::count();
        $messageCount = Message::count();

        return view('dashboard/pages/dashboard', [
            'title' => 'Dashboard',
            'userCount' => $userCount,
            'postCount' => $postCount,
            "memberCount" => $memberCount,
            "messageCount" => $messageCount,
        ]);
    }
}