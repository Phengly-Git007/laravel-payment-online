@extends('admin.master')

@section('order')
    active
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="invoice p-3 mb-3">
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> {{ config('app.name') }}.
                                <small class="float-right">Date: {{ date('d-M-Y') }}</small>
                            </h4>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From {{ config('app.name') }} Owner
                            <address>
                                <strong>{{ Auth::user()->name }}</strong><br>
                                Address : {{ Auth::user()->address1 }}, {{ Auth::user()->address2 }}, <br>
                                {{ Auth::user()->city }}, {{ Auth::user()->country }} <br>
                                Phone: (885) {{ Auth::user()->phone }}<br>
                                Email: {{ Auth::user()->email }}
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            To Value Customer
                            <address>
                                <strong>{{ $order->name }}</strong><br>
                                Address: {{ $order->address1 }}, {{ $order->address2 }}, <br>
                                {{ $order->city }} ,{{ $order->country }} <br>
                                Phone: (885) {{ $order->phone }}<br>
                                Email: {{ $order->email }}
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #{{ $order->tracking_number }}</b><br>
                            <b>Order Date :
                                {{ Request::get('date', $order->created_at->format('d-M-Y')) ?? date('d-M-Y') }}</b> <br>
                            <b>Order ID:</b> {{ $order->id }}<br>
                            <b>Pin Code: {{ $order->pincode }}</b> <br>
                            <b>Payment Method :</b> {{ $order->payment_method }}<br>
                            <b>Account:</b> {{ $order->payment_id ? $order->payment_id : 'Pay On Delivery.' }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>Serial #</th>
                                        <th>Description</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Call of Duty</td>
                                        <td>455-981-221</td>
                                        <td>El snort testosterone trophy driving gloves handsome</td>
                                        <td>$64.50</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Need for Speed IV</td>
                                        <td>247-925-726</td>
                                        <td>Wes Anderson umami biodiesel</td>
                                        <td>$50.00</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Monsters DVD</td>
                                        <td>735-845-642</td>
                                        <td>Terry Richardson helvetica tousled street art master</td>
                                        <td>$10.70</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Grown Ups Blue Ray</td>
                                        <td>422-568-642</td>
                                        <td>Tousled lomo letterpress</td>
                                        <td>$25.99</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        {{-- <div class="col-6">
                            <p class="lead">Payment Methods:</p>
                            <img src="{{ asset('admin/dist/img/credit/visa.png" alt="Visa') }}">
                            <img src="{{ asset('admin/dist/img/credit/mastercard.png" alt="Mastercard') }}">
                            <img src="{{ asset('admin/dist/img/credit/american-express.png" alt="American Express') }}">
                            <img src="{{ asset('admin/dist/img/credit/paypal2.png" alt="Paypal') }}">

                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya
                                handango imeem
                                plugg
                                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                            </p>
                        </div> --}}
                        <div class="col-12">
                            <p class="lead">
                                Order Date :
                                {{ Request::get('date', $order->created_at->format('d-M-Y')) ?? date('d-M-Y') }}
                            </p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>$250.30</td>
                                        </tr>
                                        <tr>
                                            <th>Tax (9.3%)</th>
                                            <td>$10.34</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>$5.80</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>$265.24</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row no-print">
                        <div class="col-12">
                            <a href="" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-download"></i> Generate PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
