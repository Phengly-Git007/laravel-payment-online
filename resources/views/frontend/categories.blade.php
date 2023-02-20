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
    <div class="container py-2">
        <div class="row">
            <div class="col-md-6">@lang('app.show_by_filter')</div>
            <div class="col-md-6 mb-3">
                @include('frontend.partials.search-form')
            </div>
            <div class="col-md-12">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-3 mb-3">
                            <div class="card shadow">
                                <a href="{{ url('product-by-categories/' . $category->slug) }}">
                                    <img src="{{ Storage::url($category->image) }}" alt="image" class="img-scal"
                                        style="margin-left: 50px;margin-top: 5px; margin-bottom: 0px" alt="image"
                                        width="200px" height="230px">
                                    <div class="card-body text-center" style="font-size: 15px">
                                        {{ $category->name }} <br>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="m-2">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
