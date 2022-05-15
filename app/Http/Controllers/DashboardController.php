<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __invoke()
    {
        $user = auth()->user();

        $id_list = $user->following()->pluck('follows.following_id')->toArray();
        $id_list[] = $user->id;

        $posts = Post::with('user', 'likes')->whereIn('user_id', $id_list)->orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('posts'));
    }
}
