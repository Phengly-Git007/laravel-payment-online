@extends('admin.master')
@section('title')
    Order Details
@endsection

@section('header')
    View Order Details
@endsection

@section('order')
    active
@endsection

@section('action')
    <a href="{{ url('orders') }}" class="btn btn-sm btn-warning">Back To Orders</a>
@endsection

@section('content')
    <div class="container-fluid">
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
                                        <td>{{ $item->products->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>$ {{ $item->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <h6 class="mb-0 px-3"><b>Sub Total : <span class="float-right">$
                                    {{ $orders->total_price }}</span></b>
                        </h6>
                        <div class="col-md-12 mt-3 px-3">
                            <form action="{{ url('update-orders/' . $orders->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="">Order Status : </label>
                                <select name="status" class="form-control">
                                    <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">Pending
                                    </option>
                                    <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Completed
                                    </option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-success float-right mt-3">Update
                                    Status</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
@endsection
