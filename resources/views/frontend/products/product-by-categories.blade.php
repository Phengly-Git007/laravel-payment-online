@extends('frontend.master')
@section('title')
    Product By Categories
@endsection

@section('content')
    <div class="py-3 mb-3 shadow-sm bg-info border-top">
        <div class="container">
            <a href="{{ url('/') }}">Home</a> /
            <a href="{{ url('category') }}">All Categories</a> /
            {{ $category->name }}
        </div>
    </div>

    <div class="container py-2">
        <h6><b class="shadow">{{ $category->name }}</b></h6>
        <div class="col-md-12 mt-3">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 mb-3">
                        <div class="card shadow">
                            <a href="{{ url('product-details/' . $category->slug . '/' . $product->slug) }}">
                                <img src="{{ Storage::url($product->image) }}" alt="image" class="img-scal"
                                    style="margin-left: 50px;margin-top: 5px; margin-bottom: 0px" alt="image"
                                    width="200px" height="200px">
                                <div class="card-body text-center mb-3" style="font-size: 15px">
                                    {{ $product->name }} <br>
                                    <span style="font-size: 13px"><b>Price : &nbsp; $
                                            {{ $product->selling_price }}</b></span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
