<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'type','slug','description','price','quantity'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
    
    
    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }
    
    
}
