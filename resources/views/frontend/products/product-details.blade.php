@extends('frontend.master')
@section('title')
    {{ $products->name }}
@endsection

@section('content')
    {{-- modal --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('add-product-rating') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">{{ $products->name }}</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating">
                            <div class="star-icon">
                                @if ($user_rating)
                                    @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                        <input type="radio" name="product_rating" id="rating{{ $i }}"
                                            value="{{ $i }}" checked>
                                        <label for="rating{{ $i }}" class="fa fa-star"></label>
                                    @endfor
                                    @for ($j = $user_rating->stars_rated + 1; $j <= 5; $j++)
                                        <input type="radio" name="product_rating" id="rating{{ $j }}"
                                            value="{{ $j }}">
                                        <label for="rating{{ $j }}" class="fa fa-star"></label>
                                    @endfor
                                @else
                                    <input type="radio" name="product_rating" id="rating1" value="1" checked>
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" name="product_rating" id="rating2" value="2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" name="product_rating" id="rating3" value="3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" name="product_rating" id="rating4" value="4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" name="product_rating" id="rating5" value="5">
                                    <label for="rating5" class="fa fa-star"></label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- end modal --}}
    <div class="py-3 mb-3 shadow-sm bg-info border-top">
        <div class="container">
            <div class="container">
                <a href="{{ url('/') }}">Home</a> /
                <a href="{{ url('category') }}">All Categories</a> /
                <a
                    href="{{ url('product-by-categories/' . $products->category->slug) }}">{{ $products->category->name }}</a>
                /
                {{ $products->name }}
            </div>
        </div>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow product_data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ Storage::url($products->image) }}" alt="product_image" class="w-100 img-scal"
                                    width="300px" height="400px" />
                            </div>
                            <div class="col-md-8">
                                <h5 class="mb-0">
                                    <b>{{ $products->name }}</b>
                                    @if ($products->trending)
                                        <label class="float-end badge bg-danger" style="font-size: 12px;">
                                            @lang('app.trending')
                                        </label>
                                    @else
                                        <label class="float-end badge bg-secondary" style="font-size: 12px;">
                                            @lang('app.normal')
                                        </label>
                                    @endif
                                </h5>
                                <hr />
                                <span class="badge bg-secondary mt-0">
                                    @lang('app.publish') :
                                    {{ date('d-M-Y', strtotime($products->created_at)) }}
                                </span>
                                <div class="rated float-end">
                                    @php
                                        $rate_number = number_format($rating_value);
                                    @endphp
                                    @for ($i = 1; $i <= $rate_number; $i++)
                                        <i class="fa fa-star checked"></i>
                                    @endfor
                                    @for ($j = $rate_number + 1; $j <= 5; $j++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                    <span>
                                        @if ($ratings->count() > 0)
                                            <b>{{ $ratings->count() }} @lang('app.rating') </b>
                                        @else
                                            @lang('app.no_rating')
                                        @endif
                                    </span>
                                </div>
                                <br><br>
                                <label class="fw-semibold"><b>@lang('app.sell_price') : $
                                        {{ $products->selling_price }}</b></label>
                                <span class="float-end">
                                    <button type="button" class="btn btn-secondary btn-sm py-0 px-2"
                                        style="border-radius: 10rem" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="fa-regular fa fa-star"></i> @lang('app.rating')
                                    </button>
                                    <a href="{{ url('add-product/' . $products->slug . '/review') }}"
                                        style="border-radius: 10rem" class="btn btn-primary btn-sm py-0 px-2">
                                        <i class="fa-regular fa fa-comment"></i> @lang('app.review')
                                    </a>
                                </span>
                                <p class="mt-2">{{ $products->short_description }}
                                </p>
                                <hr />
                                @if ($products->quantity > 0)
                                    <label class="badge bg-success"> {{ $products->quantity }} @lang('app.in_stock')</label>
                                @else
                                    <label class="badge bg-danger">@lang('app.out_stock')</label>
                                @endif
                                <div class="row mt-3">
                                    <div class="col-md-3">
                                        <input type="hidden" value="{{ $products->id }}" class="product_id">
                                        <label class="quantity">@lang('app.quantity')</label>
                                        <div class="input-group text-center mb-3 mt-3" style="width: 120px">
                                            <button class="input-group-text decrement-quantity">-</button>
                                            <input type="text" name="quantity" value="1" readonly
                                                class="form-control text-center quantity-input" />
                                            <button class="input-group-text increment-quantity">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-9 mt-3 ">
                                        <br />
                                        @if ($products->quantity > 0)
                                            <button type="button" class="btn btn-info me-3 float-start addToCart">
                                                @lang('app.add_cart') <i class="fa fa-shopping-cart"></i>
                                            </button>
                                        @endif
                                        <button type="button" class="btn btn-warning me-3 float-start addToWishlist">
                                            @lang('app.add_wishlist') <i class="fa fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 px-5">
                                <h6><b>@lang('app.description')</b></h6>
                                <p class="mt-2 text-sm">{{ $products->description }}</p>
                            </div>

                            <div class="row">
                                <div class="col-md-12 px-5">
                                    <hr>
                                    @foreach ($reviews as $review)
                                        <div class="user-review">
                                            <label><b>{{ $review->user->name }}</b></label>
                                            &nbsp;
                                            @if ($review->user_id == Auth::id())
                                                <a href="{{ url('edit-review/' . $products->slug . '/user-review') }}"
                                                    class="btn btn-sm btn-info py-0 px-1" style="border-radius: 10rem;">
                                                    <i class="fa fa-eye"></i>
                                                    Edit Review</a>
                                            @endif
                                            @php
                                                $rating = App\Models\Rating::where('product_id', $products->id)
                                                    ->where('user_id', $review->user->id)
                                                    ->first();
                                            @endphp
                                            @if ($rating)
                                                @php
                                                    $user_rate = $rating->stars_rated;
                                                @endphp
                                                @for ($i = 1; $i <= $user_rate; $i++)
                                                    <i class="fa fa-star checked"></i>
                                                @endfor
                                                @for ($j = $user_rate + 1; $j <= 5; $j++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                            @endif
                                            <br>
                                            <small>Review On :
                                                {{ date('d-M-Y', strtotime($review->created_at)) }}</small>
                                            <p>{{ $review->user_review }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
