<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerImage extends Model
{
    use HasFactory;

    protected $fillable = ['partner_id', 'file'];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    
}
