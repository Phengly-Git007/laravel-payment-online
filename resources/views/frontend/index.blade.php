@extends('frontend.master')

@section('title')
    Home Page
@endsection

@section('content')
    @include('frontend.partials.slider')
    <div class="container py-5">
        <div class="row">
            <h5>Trending Product</h5>
            <div class="owl-carousel item-carousel owl-theme">
                @foreach ($trending_products as $product)
                    <div class="item">
                        <div class="card">
                            <img src="{{ Storage::url($product->image) }}" alt="image" width="250px" height="250px">
                            <div class="card-body text-sm text-center">
                                {{ $product->name }}
                                <br>
                                <span><s>$ {{ $product->original_price }}</s></span>
                                &nbsp;&nbsp;&nbsp;
                                <span>$ {{ $product->selling_price }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container pb-5 mb-5">
        <div class="row">
            <h5>Popular Category</h5>
            <div class="owl-carousel item-carousel owl-theme">
                @foreach ($feature_categories as $category)
                    <div class="item">
                        <div class="card">
                            <a href="{{ url('product-by-categories/' . $category->slug) }}">
                                <img src="{{ Storage::url($category->image) }}" alt="image" width="250px"
                                    height="250px">
                                <div class="card-body text-center text-sm">
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
