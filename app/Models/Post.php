<?php

namespace App\Models;

use App\Traits\Likes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Likes;

    protected $fillable = [
        'img',
        'caption',
        'identifier',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->withCount('likes')->orderBy('created_at', 'desc');
    }
}
