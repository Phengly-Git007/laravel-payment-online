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
    <div class="container py-2">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mb-3 ">
                @include('frontend.partials.search-form')
            </div>
            <div class="col-md-12">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-3 mb-3">
                            <div class="card shadow">
                                <a href="{{ url('product-details/' . $product->category->slug . '/' . $product->slug) }}">
                                    <img src="{{ Storage::url($product->image) }}"
                                        style="margin-left: 50px;margin-top: 5px; margin-bottom: 0px" alt="image"
                                        width="200px" height="200px">
                                    <div class="card-body text-center mb-1" style="font-size: 15px">
                                        {{ $product->name }} <br>
                                        <span style="font-size: 13px"><b>Price: &nbsp; $
                                                {{ $product->selling_price }}</b></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mb-5 px-5">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
