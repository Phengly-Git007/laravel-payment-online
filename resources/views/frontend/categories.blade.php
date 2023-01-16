@extends('frontend.master')
@section('title')
    Collection
@endsection

@section('content')
    <div class="py-3 mb-3 shadow-sm bg-info border-top">
        <div class="container">
            <a href="{{ url('/') }}">Home</a> /
            <a href="#">All Categories</a>
        </div>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-3 mb-3">
                            <div class="card shadow">
                                <a href="{{ url('product-by-categories/' . $category->slug) }}">
                                    <img src="{{ Storage::url($category->image) }}" class="w-100" alt="image"
                                        width="250px" height="250px">
                                    <div class="card-body text-center">
                                        {{ $category->name }} <br>
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
