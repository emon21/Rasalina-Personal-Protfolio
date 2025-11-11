<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'long_description',
        'picture',
    ];


    // যখন portfolio_title set হবে, তখন slug auto generate হবে
    public static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            $service->title = Str::slug($service->title);
        });

        static::updating(function ($service) {
            $service->title = Str::slug($service->title);
        });
    }

    
}
