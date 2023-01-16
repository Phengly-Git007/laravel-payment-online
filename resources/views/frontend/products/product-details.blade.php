@extends('frontend.master')
@section('title')
    {{ $products->name }}
@endsection

@section('content')
    <div class="py-3 mb-3 shadow-sm bg-info border-top">
        <div class="container">
            <div class="container">
                <a href="{{ url('/') }}">Home</a> /
                <a href="{{ url('category') }}">All Categories</a> /
                <a href="{{ url('product-by-categories/' . $products->category->slug) }}">{{ $products->category->name }}</a>
                /
                {{ $products->name }}
            </div>
        </div>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow product_data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ Storage::url($products->image) }}" alt="product_image" class="w-100"
                                    width="300px" height="350px" />
                            </div>
                            <div class="col-md-8">
                                <h5 class="mb-0">
                                    <b>{{ $products->name }}</b>
                                    @if ($products->trending)
                                        <label class="float-end badge bg-danger" style="font-size: 12px;">
                                            Trending
                                        </label>
                                    @else
                                        <label class="float-end badge bg-warning" style="font-size: 12px;">
                                            Normal
                                        </label>
                                    @endif
                                </h5>
                                <hr />
                                <span class="badge bg-secondary mt-0">
                                    Publish On :
                                    {{ date('d-M-Y', strtotime($products->created_at)) }}</span>
                                <br><br>
                                <label class="me-2"><s>Original Price : $
                                        {{ $products->original_price }}</s></label>
                                <label class="fw-semibold"><b>Selling Price : $ {{ $products->selling_price }}</b></label>
                                <p class="mt-2">{{ $products->short_description }}
                                </p>
                                <hr />
                                @if ($products->quantity > 0)
                                    <label class="badge bg-success"> {{ $products->quantity }} In Stock</label>
                                @else
                                    <label class="badge bg-danger">Out Of Stock</label>
                                @endif
                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <input type="hidden" value="{{ $products->id }}" class="product_id">
                                        <label class="quantity">Quantity</label>
                                        <div class="input-group text-center mb-3 mt-3" style="width: 120px">
                                            <button class="input-group-text decrement-quantity">-</button>
                                            <input type="text" name="quantity" value="1" readonly
                                                class="form-control text-center quantity-input" />
                                            <button class="input-group-text increment-quantity">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-9 mt-3 ">
                                        <br />
                                        @if ($products->quantity > 0)
                                            <button type="button" class="btn btn-info me-3 float-start addToCart">
                                                Add To Cart <i class="fa fa-shopping-cart"></i>
                                            </button>
                                        @endif
                                        <button type="button" class="btn btn-warning me-3 float-start">
                                            Add To Wishlist <i class="fa fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr />
                                <h6><b>Description</b></h6>
                                <p class="mt-2 text-sm">{{ $products->description }}</p>
                            </div>
                        </div>
                    </div>
                @endsection
