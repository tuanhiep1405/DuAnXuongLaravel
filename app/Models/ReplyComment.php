<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    protected $table = 'reply_comments';

    protected $fillable = [
        'comment_id',
        'user_name',
        'content',
    ];

    // Liên kết đến comment mà reply này thuộc về
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
