@extends('frontend.master')
@section('title')
    Checkout
@endsection

@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6><b>Basic Details</b></h6>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Username</label>
                                <input type="text" name="name" class="form-control" placeholder="username...">
                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="email...">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="phone...">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text" name="city" class="form-control" placeholder="city...">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Country</label>
                                <input type="text" name="country" class="form-control" placeholder="country...">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Pincode</label>
                                <input type="text" name="pincode" class="form-control" placeholder="pincode...">
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="">Address 1</label>
                                <input type="text" name="address1" class="form-control" placeholder="address1...">
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" name="address2" class="form-control" placeholder="address2...">
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
                                @foreach ($cartItems as $cart)
                                    <tr>
                                        <td>{{ $cart->products->name }}</td>
                                        <td>{{ $cart->product_quantity }}</td>
                                        <td>$ {{ $cart->products->selling_price * $cart->product_quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-warning float-end">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
