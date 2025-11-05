<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    # Relationship 
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
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
