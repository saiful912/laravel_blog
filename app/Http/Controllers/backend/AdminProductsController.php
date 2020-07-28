<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class AdminProductsController extends Controller
{
    public function index()
    {
        $products=Product::orderby('name','desc')->get();
        return view('backend.page.product.index',compact('products'));
    }

    public function create()
    {
        $products=Category::orderby('name','desc')->where('parent_id',null)->get();
        return view('backend.page.product.create',compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'image'=>'required',

        ]);

        $product=new Product();
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->slug=strtolower($request->name);
        $product->category_id=$request->category_id;

        if ($request->hasFile('image')){
            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/product/'.$img);
            Image::make($image)->save($location);
            $product->image=$img;
        }

        $product->save();

        session()->flash('success','A Products Added Successful');
        return redirect()->back();
    }

    public function products_edit($id)
    {
        $main_categories=Category::orderby('name','desc')->where('parent_id',null)->get();
        $product=Product::find($id);
        return view('backend.page.product.edit',compact('product','main_categories'));
    }

    public function product_update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'image'=>'required',

        ]);
        $product=Product::find($id);
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->slug=strtolower($request->name);
        $product->category_id=$request->category_id;
        if ($request->hasFile('image')){
            if (File::exists('images/product/'.$product->image)){
                File::delete('images/product/'.$product->image);
            }
            $image=$request->file('image');
            $img=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/product/'.$img);
            Image::make($image)->save($location);
            $product->image=$img;
        }
        $product->save();

        session()->flash('success','product Updated Successful');
        return redirect()->back();
    }

    public function product_delete(Request $request,$id)
    {
       $product=Product::find($id);
       if (!is_null($product)){
           $product->delete();
       }
        session()->flash('success','product Deleted Successful');
        return redirect()->back();
    }
}
