<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request, $post_id)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $user = auth()->user();

        $user->comments()->create([
            'body' => $request->body,
            'post_id' => $post_id
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        if ($comment->user_id !== auth()->user()->id) {
            abort(404);
        }

        $comment->delete();

        return redirect()->back();
    }
}
