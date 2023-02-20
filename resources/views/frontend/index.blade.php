@extends('frontend.master')

@section('title')
    Home Page
@endsection

@section('content')
    @include('frontend.partials.slider')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3 mt-2">
                <marquee direction="right">{{ config('app.location') }}</marquee>
            </div>
            <div class="col-md-3 mt-2">
                <marquee direction="">{{ config('app.location') }} </marquee>
            </div>
            <div class="col-md-6 mb-3">
                @include('frontend.partials.search-form')
            </div>
        </div>
        <div class="row">
            <h6><b>@lang('app.trending_products')</b></h6>
            <div class="owl-carousel item-carousel owl-theme">
                @foreach ($trending_products as $product)
                    <div class="item">
                        <div class="card">
                            <a href="{{ url('product-details/' . $product->category->slug . '/' . $product->slug) }}">
                                <img src="{{ Storage::url($product->image) }}" alt="image" width="250px" height="250px">
                                <div class="card-body text-sm text-center" style="font-size: 15px">
                                    {{ $product->name }}
                                    <br>
                                    <span>$ {{ $product->selling_price }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-5">
        <div class="row">
            <h6><b>@lang('app.popular_categories')</b></h6>
            <div class="owl-carousel item-carousel owl-theme">
                @foreach ($feature_categories as $category)
                    <div class="item">
                        <div class="card">
                            <a href="{{ url('product-by-categories/' . $category->slug) }}">
                                <img src="{{ Storage::url($category->image) }}" alt="image" width="250px"
                                    height="250px">
                                <div class="card-body text-center text-sm" style="font-size: 15px">
                                    {{ $category->name }}
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('.item-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
@endsection
