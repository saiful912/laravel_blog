<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $products=Product::orderby('name','desc')->get();
        return view('frontend.home',compact('products'));
    }

    public function product()
    {
        $products=Product::orderby('name','desc')->get();
        return view('frontend.products',compact('products'));
    }

    public function products_show($id)
    {
        $product=Product::where('id',$id)->first();
        return view('frontend.show_products',compact('product'));
    }

    public function category_show($id)
    {
        $category=Category::find($id);
        if (!is_null($category)){
            return view('frontend.category_show_product',compact('category'));
        }else{
            session()->flash('errors','Sorry | There is no category Product');
            return back();
        }
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }

    public function checkout_store(Request $request)
    {
        $data=$request->all();

        $order=new Order();
        $order->name=$data['name'];
        $order->phone_number=$data['phone_number'];
        $order->email=$data['email'];
        $order->address=$data['email'];
        $order->ip_address=request()->ip();
        $order->save();

        foreach (Cart::totalCarts() as $cart){
            $cart->order_id=$order->id;
            $cart->save();
        }
        return back()->with('success','You are order successfully create!!');
    }
}
