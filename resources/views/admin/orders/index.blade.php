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

@section('action')
    <a href="" class="btn btn-sm btn-info mr-2 "><i class="fas fa-solid fa-file-excel"></i>
        Export To Excel</a>
    <a href="" class="btn btn-sm btn-primary "><i class="fas fa-regular fa-file-pdf"></i>
        Export To
        Pdf</a>
@endsection

@section('content')
    <div class="container-fluid px-3">
        <div class="card table-responsive p-0 shadow" style="background-color: rgb(229, 237, 238)">
            <div class="card-header">
                <form action="" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <span> Start Date : </span>
                            <input type="date" name="start_date"
                                value="{{ Request::get('start_date') ?? date('d-m-Y') }}"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-3">
                            <span> End Date : </span>
                            <input type="date" name="end_date" value="{{ Request::get('end_date') ?? date('d-m-Y') }}"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-3">
                            <span>Filter By Status : </span>
                            <select name="status" class="form-control form-control-sm">
                                <option value="">Select All</option>
                                <option value="0" {{ Request::get('status') == '0' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="1" {{ Request::get('status') == '1' ? 'selected' : '' }}>
                                    Completed</option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-0">
                            <br />
                            <button type="submit" class="btn btn-sm btn-warning mb-1"><i class="fas fa-search"></i>
                                Search By Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table text-nowrap">
                    @if ($orders->count() > 0)
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tracking No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Payment ID</th>
                                <th>Payment Method</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Order Date</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->tracking_number }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->payment_id ? $order->payment_id : 'No Payment ID' }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>$ {{ $order->total_price }}</td>
                                    <td>
                                        <span class="right badge badge-{{ $order->status ? 'success' : 'danger' }}">
                                            {{ $order->status ? 'Completed' : 'Pending' }}
                                        </span>
                                    </td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->updated_at }}</td>
                                    <td>
                                        <a href="{{ url('orders-details/' . $order->id) }}"
                                            class="btn btn-xs btn-outline-info mr-1"><i class="fas fa-regular fa-pen"></i>
                                            Edit </a>
                                        {{-- <a href="{{ url('delete-orders/' . $order->id) }}"
                                            class="btn btn-xs btn-outline-danger mr-1">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a> --}}
                                        <a class="btn btn-xs">
                                            <form action="{{ route('orders.delete', $order->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure delete, {{ $order->name }} ?')">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-xs btn-outline-danger"><i
                                                        class="fas fa-trash"></i> Delete</button>
                                            </form>
                                        </a>
                                        <a href="{{ url('invoice-orders/' . $order->id) }}" target="_blank"
                                            class="btn btn-xs btn-outline-primary mr-1"><i
                                                class="fas fa-solid fa-eye-slash"></i>
                                            View
                                        </a>
                                        <a href="{{ url('generate-orders/' . $order->id) }}"
                                            class="btn btn-xs btn-outline-secondary mr-1"><i
                                                class="fas fa-regular fa-file-pdf"></i>
                                            Pdf
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        <th class="text-center text-danger">No Order Found.</th>
                    @endif
                </table>
                <span class="float-right mr-5 ml-0 mt-1">
                    {{ $orders->links() }}
                </span>
            </div>
        </div>
    </div>
@endsection
