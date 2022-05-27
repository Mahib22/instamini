<?php

namespace App\Traits;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;

trait Likes
{
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function isLiked()
    {
        return $this->likes->where('user_id', Auth::id())->count();
    }
}
