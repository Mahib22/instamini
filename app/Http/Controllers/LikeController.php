<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function toggle($type, $object_id)
    {
        if ($type == "post") {
            $object = Post::findOrFail($object_id);
        } else {
            $object = Comment::findOrFail($object_id);
        }

        $attr = ['user_id' => auth()->id()];

        if ($object->likes()->where($attr)->exists()) {
            $object->likes()->where($attr)->delete();
            $msg = ['status' => 'UNLIKE'];
        } else {
            $object->likes()->create($attr);
            $msg = ['status' => 'LIKE'];
        }

        return response()->json($msg);
    }
}
