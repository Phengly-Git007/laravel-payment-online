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
                                        <th>ID</th>
                                        <th>Tracking Number</th>
                                        <th>Pincode</th>
                                        <th>Total Price</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <th>Order Date</th>
                                        <th>Action</th>
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
                                                    <i class="fa fa-eye"></i> view details</a>
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
                            <h5>Your <i class="fa fa-shopping-cart"></i> Cart Is Empty.
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
