<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $guarded = [];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public static function totalCarts(){
        $carts=Cart::where('ip_address',request()->ip())->where('order_id',Null)->get();
        return $carts;
    }

    public static function totalItems()
    {
        $carts=Cart::totalCarts();
        $total_item=0;
        foreach ($carts as $cart){
            $total_item +=$cart->product_quantity;
        }
        return $total_item;
    }
}
