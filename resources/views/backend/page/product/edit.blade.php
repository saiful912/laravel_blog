@extends('backend.layout.backend_master')
@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Category {{$product->name}}</h1>
    @include('backend.partials._message')
        <form action="{{url('/admin/product/update/'.$product->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputText">Title</label>
                <input type="text" class="form-control" name="name" id="exampleInputText" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputText">Description</label>
                <textarea class="form-control" rows="4" cols="40" name="description" id="exampleInputText">{{$product->description}}"</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputText">Price</label>
                <input type="number" class="form-control" name="price" id="exampleInputText" value="{{$product->price}}">
            </div>
            <div class="form-group">
                <label for="exampleInputText">Select Category</label>
                <select name="category_id" class="form-control">
                    <option value="">Please select a category for the product</option>
                    @foreach($main_categories as $parent)
                        <option value="{{$parent->id}}" {{$parent->id == $product->category->id ? 'selected' : ''}}>{{$parent->name}}</option>
                        @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
                            <option value="{{$child->id}}" {{$child->id == $product->category->id ? 'selected' : ''}}> ------>{{$child->name}}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="old_image">Products Old Image</label><br>
                <img src="{!! asset('images/product/'.$product->image) !!}" width="100">
            </div>

            <div class="form-group">
                <label for="new_image">Products New Image</label>
                <input type="file" class="form-control" name="image" id="new_image">
            </div>
            <button type="submit" class="btn btn-success">Update Products</button>
        </form>
    </div>

    @stop
