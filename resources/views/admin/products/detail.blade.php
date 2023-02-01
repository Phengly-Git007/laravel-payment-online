@extends('admin.master')
@section('title')
    Product Details
@endsection

@section('header')
    Product Details
@endsection

@section('product')
    active
@endsection

@section('action')
    <a href="{{ route('products.index') }}" class="ref">Back To Product</a>
@endsection


@section('content')
    <div class="container-fluid px-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow product_data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ Storage::url($product->image) }}" alt="product_image" width="300px"
                                    height="400px" style="margin-left: 50px" />
                            </div>
                            <div class="col-md-8">
                                <h5 class="mb-0">
                                    <b>{{ $product->name }}</b>
                                    @if ($product->trending)
                                        <label class="float-right badge bg-danger" style="font-size: 12px;">
                                            Trending
                                        </label>
                                    @else
                                        <label class="float-right badge bg-secondary" style="font-size: 12px;">
                                            Normal
                                        </label>
                                    @endif
                                </h5>
                                <hr />
                                <span class="badge bg-secondary mt-0">
                                    Publish On :
                                    {{ date('d-M-Y', strtotime($product->created_at)) }}
                                </span>

                                <br><br>
                                <label class="me-2 mr-3"><s>Original Price : $
                                        {{ $product->original_price }}</s></label>
                                <label class="fw-semibold"><b>Selling Price : $ {{ $product->selling_price }}</b></label>
                                <p class="mt-2">{{ $product->short_description }}
                                </p>
                                <hr />
                                @if ($product->quantity > 0)
                                    <label class="badge bg-success"> {{ $product->quantity }} In Stock</label>
                                @else
                                    <label class="badge bg-danger">Out Of Stock</label>
                                @endif
                                <div class="col-md-12">
                                    <h6><b>Description</b></h6>
                                    <p class="mt-2 text-sm">{{ $product->description }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endsection
