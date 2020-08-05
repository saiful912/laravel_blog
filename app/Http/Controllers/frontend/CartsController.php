<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class CartsController extends Controller
{
    public function index()
    {
        return view('frontend.carts');
    }

    public function store(Request $request)
    {
        $data=$request->all();
        $cart=Cart::where('ip_address',request()->ip())->where('product_id',$request->product_id)
            ->where('order_id',Null)->first();
        if (!is_null($cart)){
            $cart->increment('product_quantity');
        }else{
            $cart=new Cart();
            $cart->ip_address=request()->ip();
            $cart->product_id=$data['product_id'];
            $cart->product_quantity=$data['product_quantity'];
            $cart->save();
        }

        return back()->with('success','A Product Added To Your Cart!!');
    }


    public function update(Request $request,$id)
    {
        $cart=Cart::find($id);
        if (!is_null($cart)){
            $cart->product_quantity=$request->product_quantity;
            $cart->save();
        }else{
            return back();
        }

        return back()->with('success','Your Cart Updated!!');
    }

    public function destroy($id)
    {
        $cart=Cart::find($id);
        if (!is_null($cart)){
            $cart->delete();
        }else{
            return back();
        }
        return back()->with('success','A product Deleted To Your Cart!!');
    }

}
