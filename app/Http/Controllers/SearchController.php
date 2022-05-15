<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
        $querySearch = $request->input('query');
        $posts = Post::with('user', 'likes')->where('caption', 'like', "%{$querySearch}%")->orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('posts', 'querySearch'));
    }
}
