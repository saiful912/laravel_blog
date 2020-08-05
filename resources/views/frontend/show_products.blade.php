@extends('frontend.layout.frontend_master')
@section('main')

    <div class="container" style="margin-top: 40px;">
        @include('frontend.partials._message')
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('images/product/'.$product->image)}}"  width="100%" class="img-polaroid" alt="ProductImage">
            </div>
            <div class="col-md-8">
                <h2>{{$product->name}}</h2>
                <p>{{$product->description}}</p>
                <hr>
                <h3>Price -  Tk : {{$product->price}}</h3>
                <p class="muted">Inclusive of all taxes. Free home delivery.</p>
                <br>
                <form action="{{route('carts.store')}}" method="post">
                   @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="d-block mb-2" >
                    <label for="product_quantity">Quantity:</label>
                    <input type="number" name="product_quantity" id="product_quantity" value="1">
                </div>
                   <button type="submit" class="btn btn-primary">
                       Buy Online Now
                   </button>
                </form>

            </div>
        </div>
    </div>
    @stop
