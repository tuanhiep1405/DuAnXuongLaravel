<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'summary',
        'image',
        'user_id', 
        'views',
    ];

    // Thiết lập quan hệ với bảng users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
