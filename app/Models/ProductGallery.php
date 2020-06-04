<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $fillable = [
        'product_id', 'photo','is_default'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
