<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'post_id',
    //     'user_id',
    //     'parent_id',
    //     'comment',
    // ];

    protected $fillable = ['blog_id', 'user_id', 'parent_id', 'comment'];


    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
    // public function replies()
    // {
    //     return $this->hasMany(Comment::class, 'parent_id')->orderBy('id');
    // }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    // public function replies()
    // {
    //     return $this->hasMany(Comment::class, 'parent_id')->with('replies');
    // }
}
