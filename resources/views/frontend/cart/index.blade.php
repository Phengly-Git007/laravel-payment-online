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
                <div class="card shadow">
                    <div class="card-body">
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cartItems as $cart)
                            <div class="row product_data text-nowrap ">
                                <div class="col-md-2">
                                    <img src="{{ Storage::url($cart->products->image) }}" alt="image" width="50px"
                                        height="50px">
                                </div>
                                <div class="col-md-3">
                                    <b>{{ $cart->products->name }}</b>
                                </div>
                                <div class="col-md-2">
                                    <b>$ {{ $cart->products->selling_price }}</b>
                                </div>
                                <div class="col-md-3">
                                    <input type="hidden" class="product_id" value="{{ $cart->product_id }}">
                                    <div class="input-group text-center mb-3" style="width: 130px">
                                        <div class="input-group text-center mb-3 " style="width: 120px">
                                            <button class="input-group-text change-quantity decrement-quantity">-</button>
                                            <input type="text" name="quantity" value="{{ $cart->product_quantity }}"
                                                readonly class="form-control text-center quantity-input" />
                                            <button class="input-group-text change-quantity increment-quantity">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-outline-danger removeFromCart"><i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            @php
                                $total += $cart->products->selling_price * $cart->product_quantity;
                            @endphp
                        @endforeach
                    </div>
                    <div class="card-footer  ">
                        <h6 class="float-start ms-5"><b>Total Price : $ {{ $total }}</b></h6>
                        <a href="{{ url('checkout') }}" class="btn btn-outline-primary float-end me-5"><i
                                class="fas fa-check"></i>
                            Process Checkout
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
