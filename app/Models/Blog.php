<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'blog_title',
        'blog_image',
        'blog_tags',
        'blog_description'
    ];

    // যখন portfolio_title set হবে, তখন slug auto generate হবে
    public static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $blog->blog_title = Str::slug($blog->blog_title);
        });

        static::updating(function ($blog) {
            $blog->blog_title = Str::slug($blog->blog_title);
        });
    }

    # Relationship 
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class)->whereNull('parent_id')->latest();
    // }
}
