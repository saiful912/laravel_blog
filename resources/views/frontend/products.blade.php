@extends('frontend.layout.frontend_master')
@section('main')

    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <a href="{{route('products.show',$product->id)}}">
                                    <img src="{{asset('images/product/'.$product->image)}}" alt="" width="100%">
                                </a>

                                <div class="card-body">
                                    <a href="{{route('products.show',$product->id)}}">
                                        <p class="card-text">{{$product->name}}</p>
                                    </a>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{url('/products/show/'.$product->id)}}" class="btn btn-primary">Add To Cart</a>
                                        </div>
                                        <small class="text-muted">{{$product->price}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </main>
@stop
