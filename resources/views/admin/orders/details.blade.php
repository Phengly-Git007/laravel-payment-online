@extends('admin.master')
@section('title')
    Order Details
@endsection

@section('header')
    @lang('admin.order_detail')
@endsection

@section('order')
    active
@endsection

@section('action')
    <a href="{{ url('orders') }}" class="btn btn-sm btn-warning">@lang('admin.turn_back')</a>
    <a href="{{ url('view-invoice/' . $orders->id) }}" target="_blank" class="btn btn-sm btn-primary "><i
            class="fas fa-solid fa-eye-slash"></i> @lang('admin.view_detail')

    </a>
@endsection

@section('content')
    <div class="container-fluid px-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow table-responsive shadow p-0" style="background-color: rgb(229, 237, 238)">
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


                        <div class="col-md-12 mt-3">

                            <div class="row">
                                <div class="col-md-8">
                                </div>
                                <div class="col-md-2">
                                    Total Price : <span class="float-right">$
                                        {{ $orders->total_price + $item->products->tax }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <form action="{{ url('update-orders/' . $orders->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="status" class="form-control">
                                            <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">Pending
                                            </option>
                                            <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Completed
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-success float-right ">@lang('admin.update_status')
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
@endsection
