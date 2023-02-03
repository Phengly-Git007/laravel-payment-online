@extends('frontend.master')
@section('title')
    Review Product
@endsection


@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        @if ($verified_purchase->count() > 0)
                            <p><b>{{ $product->name }}</b>
                                <a href="{{ url('product-details/' . $product->category->slug . '/' . $product->slug) }}"
                                    class="btn btn-sm btn-warning float-end">Go Back</a>
                            </p>
                            <form action="{{ url('add-product-review') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <textarea class="form-control" name="user_review" rows="5" placeholder="Review product..."></textarea>
                                <button type="submit" class="btn btn-info float-end mt-3 px-3">Submit Review</button>
                            </form>
                        @else
                            <div class="alert alert-danger text-center" role="alert">
                                <h5>Only Customer Purchased <i class="fa-solid fa fa-cash-register"></i>
                                    Can Review Product.
                                    <a href="{{ url('category') }}" class="btn btn-warning ">Go To Shopping.</a>
                                </h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
