<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function toggle($type, $object_id)
    {
        if ($type == "post") {
            $object = Post::findOrFail($object_id);
            $post_id = $object->id;
        } else {
            $object = Comment::findOrFail($object_id);
            $post_id = $object->post_id;
        }

        $attr = ['user_id' => auth()->id()];

        if ($object->likes()->where($attr)->exists()) {
            $object->likes()->where($attr)->delete();
            $msg = ['status' => 'UNLIKE'];

            $this->cancelNotify(auth()->user(), $post_id);
        } else {
            $object->likes()->create($attr);
            $msg = ['status' => 'LIKE'];

            $this->notify(auth()->user(), $post_id);
        }

        return response()->json($msg);
    }

    private function notify($user, $post_id)
    {
        $target_id = Post::find($post_id)->user_id;

        if ($user->id !== $target_id) {
            Notification::create([
                'message' => $user->username . ' menyukai postingan anda.',
                'user_id' => $target_id,
                'post_id' => $post_id
            ]);
        }
    }

    private function cancelNotify($user, $post_id)
    {
        $target_id = Post::find($post_id)->user_id;
        if ($user->id !== $target_id) {
            Notification::where('user_id', $target_id)->where('post_id', $post_id)
                ->where('message', 'like', '%menyukai%')->delete();
        }
    }
}
