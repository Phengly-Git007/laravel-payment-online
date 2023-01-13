@extends('frontend.master')

@section('title')
    Home Page
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="owl-carousel categories-carousel owl-theme">
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
        $('.categories-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
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
