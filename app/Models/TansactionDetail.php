<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TansactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transaction_id', 'product_id'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

    public function transaction()
    {
        return $this->belongsTo(Tansaction::class, 'transaction_id','id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
