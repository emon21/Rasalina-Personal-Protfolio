<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description'
    ];

    public function images()
    {
        // return $this->hasMany(PartnerImage::class)->orderBy('sort_order')->latest('id');
        return $this->hasMany(PartnerImage::class);
    }
}
