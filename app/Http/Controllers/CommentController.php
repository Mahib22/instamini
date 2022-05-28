<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Notification;
use App\Models\Post;
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

        $this->notify($user, $post_id);

        return redirect()->back();
    }

    private function notify($user, $post_id)
    {
        $target_id = Post::find($post_id)->user_id;

        if ($user->id !== $target_id) {
            Notification::create([
                'message' => $user->username . ' mengomentari postingan anda.',
                'user_id' => $target_id,
                'post_id' => $post_id
            ]);
        }
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post_id;

        if ($comment->user_id !== auth()->user()->id) {
            abort(404);
        }

        $comment->delete();
        $this->cancelNotify(auth()->user(), $post_id);

        return redirect()->back();
    }

    private function cancelNotify($user, $post_id)
    {
        $target_id = Post::find($post_id)->user_id;
        if ($user->id !== $target_id) {
            Notification::where('user_id', $target_id)->where('post_id', $post_id)
                ->where('message', 'like', '%mengomentari%')->delete();
        }
    }
}
