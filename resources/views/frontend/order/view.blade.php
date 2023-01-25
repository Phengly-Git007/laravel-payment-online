@extends('frontend.master')
@section('title')
    Show Order
@endsection

@section('content')
    <div class="py-3 mb-3 shadow-sm bg-info border-top">
        <div class="container">
            <a href="{{ url('/') }}">Home</a> /
            <a href="{{ url('/my-orders') }}">My Orders</a> /
            View Order Details
        </div>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-5">
                <div class="card shadow">

                    <div class="card-body">
                        <h6><b>User Information</b></h6>
                        <hr>
                        <div class="p-2">UserName : <b>{{ $orders->name }}</b></div>
                        <div class="p-2">Email : <b>{{ $orders->email }}</b></div>
                        <div class="p-2">Phone : <b>{{ $orders->phone }}</b></div>
                        <div class="p-2">Address : <b>{{ $orders->address1 }}, {{ $orders->address2 }}</b></div>
                        <div class="p-2">City : <b>{{ $orders->city }}</b></div>
                        <div class="p-2">Country : <b>{{ $orders->country }}</b></div>
                        <div class="p-2">Pincode : <b>{{ $orders->pincode }}</b></div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card shadow table-responsive p-0">
                    <div class="card-body">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders->orderItems as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ Storage::url($item->products->image) }}" alt="image"
                                                width="50px" height="50px">
                                        </td>
                                        <td>
                                            <a
                                                href="{{ url('product-details/' . $item->products->category->slug . '/' . $item->products->slug) }}">
                                                {{ $item->products->name }}
                                            </a>
                                        </td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>$ {{ $item->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h6 class="mb-3 px-3 "><b>Payment ID : <span class="float-end">
                                    {{ $orders->payment_id ? $orders->payment_id : 'No Payment ID' }}</span></b>
                        </h6>
                        <h6 class="mb-0 px-3"><b>Sub Total : <span class="float-end">$
                                    {{ $orders->total_price }}</span></b>
                        </h6>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
