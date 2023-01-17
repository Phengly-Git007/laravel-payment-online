@extends('frontend.master')
@section('title')
    Product Page
@endsection

@section('content')
    <div class="py-3 mb-3 shadow-sm bg-info border-top">
        <div class="container">
            <a href="{{ url('/') }}">Home</a> /
            <a href="#">All Products</a>
        </div>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-3 mb-3">
                            <div class="card shadow">
                                <a href="{{ url('product-details/' . $product->category->slug . '/' . $product->slug) }}">
                                    <img src="{{ Storage::url($product->image) }}" class="w-100" alt="image"
                                        width="230px" height="250px">
                                    <div class="card-body text-center mb-3">
                                        {{ $product->name }} <br>
                                        <span class="  text-danger"><s>$ {{ $product->original_price }}</s></span>
                                        &nbsp;&nbsp;
                                        <span>$ {{ $product->selling_price }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
