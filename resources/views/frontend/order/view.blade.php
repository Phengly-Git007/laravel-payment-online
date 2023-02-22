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
                        <h6><b>@lang('app.user_info')</b></h6>
                        <hr>
                        <label>@lang('app.name') : {{ $orders->name ? $orders->name : '' }}</label>
                        <br>
                        <label>@lang('app.email') : {{ $orders->email ? $orders->email : '' }}</label>
                        <br>
                        <label>@lang('app.phone') : {{ $orders->phone ? $orders->phone : '' }}</label>
                        <br>
                        <label>@lang('app.address') : {{ $orders->address1 ? $orders->address1 : '' }},
                            {{ $orders->address2 ? $orders->address2 : '' }}
                        </label>
                        <br>
                        <label>@lang('app.city') : {{ $orders->city ? $orders->city : '' }}</label>
                        <br>
                        <label>@lang('app.country') : {{ $orders->country ? $orders->country : '' }}</label>
                        <br>
                        <label>@lang('app.code') : {{ $orders->pincode ? $orders->pincode : '' }}</label>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card shadow table-responsive p-0">
                    <div class="card-body">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>@lang('app.img')</th>
                                    <th>@lang('app.img_name')</th>
                                    <th>@lang('app.quantity')</th>
                                    <th>@lang('app.price')</th>
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
                        <h6 class="mb-3 px-3 ">@lang('app.pay_id') : <span class="float-end">
                                {{ $orders->payment_id ? $orders->payment_id : 'No Payment ID' }}</span>
                        </h6>
                        <h6 class="mb-0 px-3">@lang('app.total_price') : <span class="float-end">$
                                {{ $orders->total_price }}</span>
                        </h6>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
