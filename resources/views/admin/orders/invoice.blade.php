<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <title>Generate Invoice</title>
</head>

<body>
    <div class="px-3 py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="invoice p-3 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <h5>
                                <i class="fas fa-globe"></i>
                                {{ config('app.name') }}
                                <i class="fas fa-shopping-cart"></i>
                                <small class="float-right">Date: {{ date('d-M-Y') }}</small>
                            </h5>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <b>From {{ config('app.name') }} Owner</b>
                            <address>
                                <span class="text-primary">{{ Auth::user()->name }}</span><br>
                                Address : {{ Auth::user()->address1 }}, {{ Auth::user()->address2 }}, <br>
                                {{ Auth::user()->city }}, {{ Auth::user()->country }} <br>
                                Phone: (885) {{ Auth::user()->phone }}<br>
                                Email: {{ Auth::user()->email }}
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            <b> To Customer</b>
                            <address>
                                <span class="text-primary">{{ $order->name }}</span><br>
                                Address: {{ $order->address1 }}, {{ $order->address2 }}, <br>
                                {{ $order->city }} ,{{ $order->country }} <br>
                                Phone: (885) {{ $order->phone }}<br>
                                Email: {{ $order->email }}
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #{{ $order->tracking_number }}</b><br>
                            Order Date :
                            {{ Request::get('date', $order->created_at->format('d-M-Y')) ?? date('d-M-Y') }}
                            <br>
                            Order ID: {{ $order->id }}<br>
                            Pin Code: {{ $order->pincode }} <br>
                            Payment Method : {{ $order->payment_method }} <br>
                            Account: {{ $order->payment_id ? $order->payment_id : 'Pay On Delivery.' }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($order->orderItems as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->products->name }}</td>
                                            <td>$ {{ $item->products->selling_price }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>$ {{ $item->quantity * $item->products->selling_price }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="px-3 mr-5 float-right">
                                <b>
                                    Total Price : $ {{ $order->total_price }}
                                </b>
                            </h6>
                        </div>
                    </div>
                    <div class=" text-center" style="font-size: 17px">
                        Thank For Shopping <b>eoPays</b> Store.
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
