@extends('backend.layout.backend_master')
@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add Product</h1>
@include('backend.partials._message')
    <form action="{{route('admin.products.store')}}" method="post" class="form form-horizontal w-75" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputText">Title</label>
            <input type="text" class="form-control" name="name" id="exampleInputText">
        </div>
        <div class="form-group">
            <label for="exampleInputText">Description</label>
            <textarea class="form-control" rows="4" cols="40" name="description" id="exampleInputText"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputText">Price</label>
            <input type="number" class="form-control" name="price" id="exampleInputText">
        </div>
        <div class="form-group">
            <label for="exampleInputText">Select Category</label>
            <select name="category_id" class="form-control">
                <option value="">Please select a category for the product</option>
                @foreach($products as $parent)
                    <option value="{{$parent->id}}">{{$parent->name}}</option>
                    @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
                        <option value="{{$child->id}}"> ------>{{$child->name}}</option>
                    @endforeach
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="productImage">Product Image</label>
            <input type="file" class="form-control" name="image" id="productImage">
        </div>


        <button type="submit" class="btn btn-primary btn-block">
            Add Products
        </button>
    </form>


</div>

@stop
