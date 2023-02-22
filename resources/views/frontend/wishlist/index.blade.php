@extends('frontend.master')
@section('title')
    Wishlist
@endsection

@section('content')
    <div class="py-3 mb-3 shadow-sm bg-info border-top">
        <div class="container">
            <a href="{{ url('/') }}">Home</a> /
            My Wishlist
        </div>
    </div>
    <div class="container py-3">
        <div class="card shadow wishlist-items">
            @if ($wishlists->count() > 0)
                <div class="card-body">
                    @foreach ($wishlists as $wishlist)
                        <div class="row product_data ">
                            <div class="col-md-2 my-auto">
                                <img src="{{ Storage::url($wishlist->products->image) }}" alt="image" width="50px"
                                    height="50px">
                            </div>
                            <div class="col-md-2 my-auto">
                                <b>{{ $wishlist->products->name }}</b>
                            </div>
                            <div class="col-md-2 my-auto">
                                <b>$ {{ $wishlist->products->selling_price }}</b>
                            </div>
                            <div class="col-md-2 my-auto">
                                <input type="hidden" class="product_id" value="{{ $wishlist->product_id }}">
                                @if ($wishlist->products->quantity >= $wishlist->product_quantity)
                                    <label for="">@lang('app.quantity')</label>
                                    <div class="input-group text-center mb-3 " style="width: 120px">
                                        <button class="input-group-text decrement-quantity">-</button>
                                        <input type="text" name="quantity" value="1" readonly
                                            class="form-control text-center quantity-input" />
                                        <button class="input-group-text increment-quantity">+</button>
                                    </div>
                                @else
                                    <label class="badge bg-danger">@lang('app.out_stock')</label>
                                @endif
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-outline-primary addToCart"><i class="fas fa-shopping-cart"></i>
                                    @lang('app.add_cart')
                                </button>
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-outline-danger removeFromWishlist"><i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="card-body text-center">
                    <h5><i class="fa fa-heart"></i> @lang('app.empty_wishlist')
                        <a href="{{ url('category') }}" class="btn btn-outline-warning float-end">@lang('app.back_shopping')</a>
                    </h5>
                </div>
            @endif
        </div>
    </div>
@endsection
