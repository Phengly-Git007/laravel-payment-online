@extends('frontend.master')
@section('title')
    Checkout
@endsection

@section('content')
    <div class="py-3 mb-3 shadow-sm bg-info border-top">
        <div class="container">
            <a href="{{ url('/') }}">Home</a> /
            <a href="{{ url('/view-cart-item') }}">My Cart</a> /
            Checkout Page
        </div>
    </div>
    <div class="container py-3">
        <form action="{{ url('place-order-product') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6><b>Information Details</b></h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="name" value="{{ Auth::user()->name }}" readonly
                                        class="form-control @error('name') is-invalid @enderror " placeholder="username...">
                                    @error('name')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-4">
                                    <input type="email" name="email" value="{{ Auth::user()->email }}" readonly
                                        class="form-control @error('email') is-invalid @enderror " placeholder="email...">
                                    @error('email')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-4">
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}"
                                        class="form-control @error('phone') is-invalid @enderror " placeholder="phone...">
                                    @error('phone')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-4">
                                    <input type="text" name="city" value="{{ Auth::user()->city }}"
                                        class="form-control @error('city') is-invalid @enderror " placeholder="city...">
                                    @error('city')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-4">
                                    <input type="text" name="country" value="{{ Auth::user()->country }}"
                                        class="form-control @error('country') is-invalid @enderror "
                                        placeholder="country...">
                                    @error('country')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-4">
                                    <input type="text" name="pincode" value="{{ Auth::user()->pincode }}"
                                        class="form-control @error('pincode') is-invalid @enderror "
                                        placeholder="pincode...">
                                    @error('pincode')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-4">
                                    <input type="text" name="address1" value="{{ Auth::user()->address1 }}"
                                        class="form-control @error('address1') is-invalid @enderror "
                                        placeholder="address1...">
                                    @error('address1')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-4 mb-4">
                                    <input type="text" name="address2" value="{{ Auth::user()->address2 }}"
                                        class="form-control @error('address2') is-invalid @enderror "
                                        placeholder="address2...">
                                    @error('address2')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6><b>Order Details</b></h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Quantity</td>
                                        <td>Price</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($cartItems->count() > 0)
                                        @foreach ($cartItems as $cart)
                                            <tr>
                                                <td>{{ $cart->products->name }}</td>
                                                <td>{{ $cart->product_quantity }}</td>
                                                <td>$ {{ $cart->products->selling_price }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <td>
                                            <p>No Cart Item</p>
                                        </td>
                                    @endif

                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-warning w-100">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
