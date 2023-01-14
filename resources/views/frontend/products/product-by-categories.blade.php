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

    <div class="container py-3">
        <h5>{{ $category->name }}</h5>
        <div class="col-md-12">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <a href="#">
                                <img src="{{ Storage::url($product->image) }}" alt="image" width="250px" height="250px">
                                <div class="card-body mb-3">
                                    {{ $product->name }} <br>
                                    <span class="float-start text-danger"><s>$ {{ $product->original_price }}</s></span>
                                    <span class="float-end">$ {{ $product->selling_price }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
