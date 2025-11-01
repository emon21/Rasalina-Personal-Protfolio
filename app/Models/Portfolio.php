<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;

    // Fillable fields (mass assignment protection)
    protected $fillable = [
        'portfolio_name',
        'portfolio_title',
        'portfolio_image',
        'portfolio_description',
        // 'slug'
    ];


    // যদি চান slug দিয়ে binding হোক (ঐচ্ছিক, কিন্তু ভালো অভ্যাস)
    // public function getPortfolioTitle()
    // {
    //     // return 'slug';
    //     return Str::slug('portfolio_title');
    // }

    // public function getRouteKeyName()
    // {

    //     return Str::slug('portfolio_name'); // এখানে Laravel slug/unique name দিয়ে খুঁজবে
    // }


    // যখন portfolio_title set হবে, তখন slug auto generate হবে
    public static function boot()
    {
        parent::boot();

        static::creating(function ($portfolio) {
            $portfolio->portfolio_title = Str::slug($portfolio->portfolio_title);
        });

        static::updating(function ($portfolio) {
            $portfolio->portfolio_title = Str::slug($portfolio->portfolio_title);
        });
    }

}
