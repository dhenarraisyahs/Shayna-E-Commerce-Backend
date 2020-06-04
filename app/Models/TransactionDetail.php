<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'transaction_id', 'product_id'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
