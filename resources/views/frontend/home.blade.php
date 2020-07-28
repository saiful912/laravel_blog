@extends('frontend.layout.frontend_master')
@section('main')
    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1>Laravel Project</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator,
                    etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                <p>
                    <a href="{{route('products')}}" class="btn btn-primary my-2">Our Products</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
            </div>
        </section>

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
@endsection
