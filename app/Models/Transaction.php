<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'name', 'uuid','email','number','address','transaction_total','transaction_status'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];
}
