@extends('frontend.master')
@section('title')
    Checkout
@endsection

@section('content')
    <div class="py-3 mb-3 shadow-sm bg-info border-top">
        <div class="container">
            <a href="{{ url('/') }}">Home</a> /
            <a href="{{ url('/view-cart-item') }}">My Cart</a> /
            Checkout Page
        </div>
    </div>
    <div class="container py-3">
        <form action="{{ url('place-order-product') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6><b>@lang('app.user_info')</b></h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="name" value="{{ Auth::user()->name }}" readonly
                                        class="form-control name @error('name') is-invalid @enderror "
                                        placeholder="username...">
                                    @error('name')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <span id="name_err" class="text-danger"></span>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}"
                                        readonly class="form-control email @error('email') is-invalid @enderror "
                                        placeholder="email...">
                                    @error('email')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <span id="email_err" class="text-danger"></span>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone }}"
                                        class="form-control phone @error('phone') is-invalid @enderror "
                                        placeholder="phone...">
                                    @error('phone')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <span id="phone_err" class="text-danger"></span>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <input type="text" name="city" value="{{ Auth::user()->city }}"
                                        class="form-control city  @error('city') is-invalid @enderror "
                                        placeholder="city...">
                                    @error('city')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <span id="city_err" class="text-danger"></span>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <input type="text" id="country" name="country" value="{{ Auth::user()->country }}"
                                        class="form-control country @error('country') is-invalid @enderror "
                                        placeholder="country...">
                                    @error('country')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <span id="country_err" class="text-danger"></span>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <input type="text" id="pincode" name="pincode" value="{{ Auth::user()->pincode }}"
                                        class="form-control pincode @error('pincode') is-invalid @enderror "
                                        placeholder="pincode...">
                                    @error('pincode')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <span id="pincode_err" class="text-danger"></span>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <input type="text" id="address1" name="address1"
                                        value="{{ Auth::user()->address1 }}"
                                        class="form-control address1 @error('address1') is-invalid @enderror "
                                        placeholder="address1...">
                                    @error('address1')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <span id="address1_err" class="text-danger"></span>
                                </div>
                                <div class="col-md-12 mt-4 mb-4">
                                    <input type="text" id="address2" name="address2"
                                        value="{{ Auth::user()->address2 }}"
                                        class="form-control address2 @error('address2') is-invalid @enderror "
                                        placeholder="address2...">
                                    @error('address2')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <span id="address2_err" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6><b>@lang('app.order_details')</b></h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>@lang('app.name')</td>
                                        <td>@lang('app.quantity')</td>
                                        <td>@lang('app.price')</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($cartItems->count() > 0)
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($cartItems as $cart)
                                            <tr>
                                                <td>{{ $cart->products->name }}</td>
                                                <td>{{ $cart->product_quantity }}</td>
                                                <td>$ {{ $cart->products->selling_price }}</td>
                                            </tr>
                                            @php
                                                $total += $cart->products->selling_price * $cart->product_quantity;
                                            @endphp
                                        @endforeach
                                    @else
                                        <td>
                                            <p>No Cart Item</p>
                                        </td>
                                    @endif
                                </tbody>
                            </table>
                            <div class="mb-2 px-3"><b>@lang('app.total_price') : <span class="float-end">$
                                        {{ $total }}</span></b>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div id="paypal-button-container" class="paypal-payment-method"></div>
                                </div>
                                <div class="col-md-6 ">
                                    <input type="hidden" name="payment_method" value="Cost On Delivery">
                                    <button type="submit" class="btn btn-info py-1 w-100 mb-2">
                                        Pay On Delivery
                                    </button>
                                    <button type="button" class="btn btn-primary py-1 w-100 mt-1 strips-payment-method">
                                        Pay With Strips
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


@section('js')
    <script
        src="https://www.paypal.com/sdk/js?client-id=AWGRj_BFM-Eo24UvFFChAp-dMLx2-SbSLlfooP0BjhrfeuxycBMI5ZIDfMZEcm3Mzgbtl4U_SPqqV7UM&currency=USD">
    </script>
    <script>
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ $total }}' // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {
                    // const transaction = orderData.purchase_units[0].payments.captures[0];
                    // alert(
                    //     `Transaction ${transaction.status}: ${transaction.id}\n\n
                //     See console for all available details`
                    // );
                    // alert('Transition completed successfully by ' + orderData.payer.name.given_name);
                    var name = $('.name').val();
                    var email = $('.email').val();
                    var phone = $('.phone').val();
                    var pincode = $('.pincode').val();
                    var city = $('.city').val();
                    var country = $('.country').val();
                    var address1 = $('.address1').val();
                    var address2 = $('.address2').val();
                    $.ajax({
                        method: "POST",
                        url: "/place-order-product",
                        data: {
                            'name': name,
                            'email': email,
                            'phone': phone,
                            'pincode': pincode,
                            'city': city,
                            'country': country,
                            'address1': address1,
                            'address2': address2,
                            'payment_method': 'Purchase By Paypal',
                            'payment_id': orderData.id
                        },
                        success: function(response) {
                            swal(response.status)
                                .then((value) => {
                                    window.location.href = '/my-orders';
                                })
                        }
                    });
                });
            }
        }).render('#paypal-button-container');
    </script>
@endsection
