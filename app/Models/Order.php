<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $guarded = [];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
