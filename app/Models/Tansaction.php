<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tansaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'uuid','email','number','address','transaction_total','transaction_status'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

    public function details()
    {
        return $this->hasMany(TansactionDetail::class, 'transaction_id');
    }
}
