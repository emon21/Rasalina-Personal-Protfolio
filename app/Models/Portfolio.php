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
    ];

    // public function getRouteKeyName()
    // {
        
    //     return Str::slug('portfolio_name'); // এখানে Laravel slug/unique name দিয়ে খুঁজবে
    // }

}
