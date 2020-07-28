@extends('frontend.layout.frontend_master')
@section('main')

    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container">
                @include('frontend.partials._message')
                <h3 class="text-center">Product in {{$category->name}} Category</h3>
                @php
                    $productss=$category->products()->get();
                @endphp

             @if($productss->count() > 0)

                    <div class="row">
                        @foreach($productss as $products)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <a href="{{route('products.show',$products->id)}}">
                                    <img src="{{asset('images/product/'.$products->image)}}" alt="" width="100%">
                                </a>

                                <div class="card-body">
                                    <a href="{{route('products.show',$products->id)}}">
                                        <p class="card-text">{{$products->name}}</p>
                                    </a>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{url('/products/show/'.$products->id)}}" class="btn btn-primary">Add To Cart</a>
                                        </div>
                                        <small class="text-muted">TK. {{$products->price}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                 @else
                    <div class="alert alert-danger">
                        No Products has added yet in this category!!
                    </div>
                @endif
            </div>
        </div>

    </main>
@stop
