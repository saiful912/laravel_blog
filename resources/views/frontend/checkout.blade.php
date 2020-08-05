@extends('frontend.layout.frontend_master')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body mt-5">
                    <h4 class="text-center font-weight-bold text-secondary">Carts added product</h4>
                    <hr>
                    @php
                        $total_price= 0;
                    @endphp
                    @foreach((new App\Models\Cart)->totalCarts() as $cart)

                        <p>
                            {{$cart->product->name}} -
                            <strong>{{$cart->product->price}} Taka</strong>
                            -{{$cart->product_quantity}} item
                        </p>

                        @php
                            $total_price += $cart->product->price * $cart->product_quantity;
                        @endphp
                    @endforeach

                    <h5 class="font-weight-bold text-secondary border-bottom">Total Price : {{number_format($total_price,2)}} Tk</h5>
                    <p>
                        <a href="{{route('carts')}}">Change to cart item</a>
                    </p>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card card-body mt-5 mb-5">
                    <h5 class="text-danger font-weight-bold text-center">Order Products</h5>
                    <form method="post" action="{{ route('checkouts.store') }}">
                        @csrf
                        <div class="form-group row mt-2">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Receiver Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text"
                                       class="form-control" name="name"
                                        required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_no" type="text" class="form-control"
                                       name="phone_number"  autofocus required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control"
                                       name="email" required autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shipping_address"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address (optional)') }}</label>

                            <div class="col-md-6">
                        <textarea id="shipping_address"
                                  class="form-control" rows="4" name="shipping_address" autofocus required>
                        </textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary form-control">
                                    {{ __('Order Now') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
