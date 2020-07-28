<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
}
