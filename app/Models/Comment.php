<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    protected $fillable = ['post_id', 'user_name', 'content'];

    public function replies()
    {
        return $this->hasMany(ReplyComment::class);
    }
}
