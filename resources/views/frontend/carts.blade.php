@extends('frontend.layout.frontend_master')
@section('main')
    <div class="container">
        @include('frontend.partials._message')
        <h4 class="mt-3 text-center font-weight-bold text-dark">My Added Product</h4>
        @if((new App\Models\Cart)->totalItems() > 0)
            <table class="table table-bordered table-striped table-hover table-info">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Product Quantity</th>
                    <th>Unit Price</th>
                    <th>Sub total Price</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $total_price= 0;
                @endphp
                @foreach((new App\Models\Cart)->totalCarts() as $cart)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>
                            <a href="{{route('products.show',$cart->product->id)}}" style="color: white;
    font-weight: bold;">{{$cart->product->name}}</a>
                        </td>
                        <td>

                            <a href="{{route('products.show',$cart->product->id)}}">
                                <img src="{{asset('images/product/'.$cart->product->image)}}" width="60px" alt="">
                            </a>

                        </td>
                        <td class="d-flex">
                            <form class="form-inline" action="{{route('carts.update',$cart->id)}}" method="post">
                                @csrf
                                <input type="number" name="product_quantity" class="form-control" value="{{$cart->product_quantity}}">
                                <button type="submit" class="btn btn-success ml-2">Update</button>
                            </form>
                        </td>
                        <td>{{number_format($cart->product->price,2)}} x {{$cart->product_quantity}}</td>
                        @php
                            $total_price += $cart->product->price * $cart->product_quantity;
                        @endphp
                        <td>{{number_format($cart->product->price * $cart->product_quantity,2)}}</td>
                        <td>
                            <form class="form-inline" action="{{route('carts.delete',$cart->id)}}" method="post">
                                @csrf
                                <input type="hidden" name="cart_id">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4"></td>
                    <td>Total Amount : </td>
                    <td colspan="2">
                        <strong>{{number_format($total_price,2)}} Taka</strong>
                    </td>
                </tr>
                </tbody>

            </table>
            <div class="text-right mb-3">
                <a href="{{route('products')}}" class="btn btn-info btn-lg">Continue Shopping..</a>
                <a href="{{route('checkouts')}}" class="btn btn-primary btn-lg">Checkout</a>
            </div>
            @else
            <div class="alert-danger">
                No products added in your cart!!
            </div>
        @endif
    </div>
@stop
