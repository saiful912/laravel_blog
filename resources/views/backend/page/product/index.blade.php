@extends('backend.layout.backend_master')
@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Products View</h1>

    @include('backend.partials._message')
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>
                               {{$product->category->name}}
                            </td>
                            <td>
                                {{$product->price}}
                            </td>
                            <td>
                                <img src="{{asset('images/product/'.$product->image)}}" alt="" width="80px">
                            </td>
                            <td class="d-flex">
                                <a href="{{url('/admin/product/edit/'.$product->id)}}" class="btn btn-success btn-icon-split" style="margin-right: 10px;">
                                    <span class="text">Edit</span>
                                </a>
                                <form action="{{url('/admin/products/delete/'.$product->id)}}"
                                      method="post">
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-danger">Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    @stop
