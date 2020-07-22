<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function home()
    {
        $products=Product::orderby('name','desc')->get();
        return view('frontend.home',compact('products'));
    }

    public function product()
    {
        return view('frontend.products');
    }
}
