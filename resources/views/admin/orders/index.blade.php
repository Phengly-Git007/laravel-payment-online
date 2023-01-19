@extends('admin.master')
@section('title')
    All Order Management
@endsection
@section('header')
    All Order Management
@endsection

@section('order')
    active
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card table-responsive p-0">
            <div class="card-body">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tracking No</th>
                            <th>Pincode</th>
                            <th>Total</th>
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
                                <td>
                                    <span class="right badge badge-{{ $order->status ? 'success' : 'danger' }}">
                                        {{ $order->status ? 'Completed' : 'Pending' }}
                                    </span>
                                </td>
                                <td>{{ date('d-M-Y', strtotime($order->created_at)) }}</td>
                                <td>
                                    <a href="{{ url('orders-details/' . $order->id) }}" class="btn btn-sm btn-info"><i
                                            class="fas fa-eye"></i> Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
