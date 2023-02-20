@extends('frontend.master')
@section('title')
    My Cart List
@endsection

@section('content')
    <div class="py-3 mb-3 shadow-sm bg-info border-top">
        <div class="container">
            <a href="{{ url('/') }}">Home</a> /
            My Cart
        </div>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow cart-items">
                    @if ($cartItems->count() > 0)
                        <div class="card-body">
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cartItems as $cart)
                                <div class="row product_data text-nowrap ">
                                    <div class="col-md-2 my-auto">
                                        <img src="{{ Storage::url($cart->products->image) }}" alt="image" width="50px"
                                            height="50px">
                                    </div>
                                    <div class="col-md-3 my-auto">
                                        <b>{{ $cart->products->name }}</b>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <b>$ {{ $cart->products->selling_price }}</b>
                                    </div>
                                    <div class="col-md-3 my-auto">
                                        <input type="hidden" class="product_id" value="{{ $cart->product_id }}">
                                        @if ($cart->products->quantity >= $cart->product_quantity)
                                            <div class="input-group text-center mb-3 " style="width: 120px">
                                                <button
                                                    class="input-group-text change-quantity decrement-quantity">-</button>
                                                <input type="text" name="quantity" value="{{ $cart->product_quantity }}"
                                                    readonly class="form-control text-center quantity-input" />
                                                <button
                                                    class="input-group-text change-quantity increment-quantity">+</button>
                                            </div>
                                            @php
                                                $total += $cart->products->selling_price * $cart->product_quantity;
                                            @endphp
                                        @else
                                            <label class="badge bg-danger">Out Of Stock, Try Again !</label>
                                        @endif
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <button class="btn btn-outline-danger removeFromCart"><i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="card-footer  ">
                            <a href="{{ url('checkout') }}" class="btn btn-warning float-end ms-5 me-5"><i
                                    class="fas fa-check"></i>
                                @lang('app.checkout_page')
                            </a>
                            <h6 class="float-end  mt-2"><b>@lang('app.total_price') : $ {{ $total }}</b></h6>

                        </div>
                    @else
                        <div class="card-body text-center">
                            <h5> <i class="fa fa-shopping-cart"></i> @lang('app.empty_cart')
                                <a href="{{ url('category') }}" class="btn btn-outline-warning float-end ">
                                    @lang('app.back_shopping')</a>
                            </h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
