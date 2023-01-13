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
                            <div class="card-body text-center">
                                {{ $product->name }}
                                <span class="float-start">{{ $product->selling_price }}</span>
                                <span class="float-end"><s>{{ $product->original_price }}</s></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <h5>Popular Category</h5>
            <div class="owl-carousel item-carousel owl-theme">
                @foreach ($feature_categories as $category)
                    <div class="item">
                        <div class="card">
                            <img src="{{ Storage::url($category->image) }}" alt="image" width="250px" height="250px">
                            <div class="card-body text-center">
                                {{ $category->name }}
                            </div>
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
