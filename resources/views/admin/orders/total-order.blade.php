@extends('admin.master')
@section('title')
    Total Orders
@endsection

@section('all-order')
    active
@endsection

@section('content')
    <div class="container-fluid px-3">
        <div class="card table-responsive p-0">
            <div class="card-header">
                <form action="" method="GET">
                    @csrf
                    <div class="row">

                        <div class="col-md-3">
                            <label for="">Filter By Status : </label>
                            <select name="status" class="form-control">
                                <option value="">Select All</option>
                                <option value="0" {{ Request::get('status') == '0' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="1" {{ Request::get('status') == '1' ? 'selected' : '' }}>
                                    Completed</option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-2">
                            <br />
                            <button type="submit" class="btn btn-warning mb-1"><i class="fas fa-search"></i>
                                Search Order By Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">

                <table class="table text-nowrap">
                    @if ($total_orders->count() > 0)
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tracking No</th>
                                <th>Payment ID</th>
                                <th>Payment Method</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($total_orders as $order)
                                <tr>

                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->tracking_number }}</td>
                                    <td>{{ $order->payment_id ? $order->payment_id : 'No Payment ID' }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>$ {{ $order->total_price }}</td>
                                    <td>
                                        <span class="right badge badge-{{ $order->status ? 'success' : 'danger' }}">
                                            {{ $order->status ? 'Completed' : 'Pending' }}
                                        </span>
                                    </td>
                                    <td>{{ date('d-M-Y', strtotime($order->created_at)) }}</td>
                                    <td>
                                        <a href="{{ url('orders-details/' . $order->id) }}" class="btn btn-xs btn-info"> <i
                                                class="fas fa-eye"></i> Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        <th class="text-center text-danger">No Order Found.</th>
                    @endif
                </table>
                <hr>
                <div class="float-right mb-0">
                    {{ $total_orders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
