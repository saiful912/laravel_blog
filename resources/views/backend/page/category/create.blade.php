@extends('backend.layout.backend_master')
@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Add Category</h1>
@include('backend.partials._message')
    <form action="{{route('admin.categories.store')}}" method="post" class="form form-horizontal w-75" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="exampleInputText">Description</label>
            <textarea class="form-control" rows="4" cols="40" name="description" id="exampleInputText"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputText">Parent Category (optional)</label>
            <select class="form-control" name="parent_id">
                <option value="">Please select a parent category</option>
                @foreach($main_categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Category Image</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>


        <button type="submit" class="btn btn-primary btn-block">
            Add Categories
        </button>
    </form>


</div>

@stop
