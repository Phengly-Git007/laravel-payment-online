@extends('frontend.master')
@section('title')
    My Orders
@endsection

@section('content')
    <div class="py-3 mb-3 shadow-sm bg-info border-top">
        <div class="container">
            <a href="{{ url('/') }}">Home</a> /
            My Orders
        </div>
    </div>
    <div class="container py-3">
        <div class="row">
            @if ($orders->count() > 0)
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>@lang('app.id')</th>
                                        <th>@lang('app.traking_no')</th>
                                        <th>@lang('app.code')</th>
                                        <th>@lang('app.total_price')</th>
                                        <th>@lang('app.pay_methode')</th>
                                        <th>@lang('app.status')</th>
                                        <th>@lang('app.order_date')</th>
                                        <th>@lang('app.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->tracking_number }}</td>
                                            <td>{{ $order->pincode }}</td>
                                            <td>$ {{ $order->total_price }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>
                                                <span class="badge bg-{{ $order->status ? 'success' : 'danger' }}">
                                                    {{ $order->status ? 'Completed' : 'Pending' }}
                                                </span>
                                            </td>
                                            <td>{{ date('d-M-Y', strtotime($order->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('view-orders/' . $order->id) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fa fa-eye"></i> @lang('app.detail')</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            <h5>Your <i class="fa fa-shopping-cart"></i> Order Is Empty.
                                <a href="{{ url('category') }}" class="btn btn-outline-warning ">Back To
                                    Shopping.</a>
                            </h5>
                        </div>
                    </div>
                </div>
            @endif


        </div>
    </div>
@endsection
