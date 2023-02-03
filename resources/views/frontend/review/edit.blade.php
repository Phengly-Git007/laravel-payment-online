@extends('frontend.master')
@section('title')
    Update Review Product
@endsection


@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <p><b>{{ $review->product->name }}</b>
                            <a href="{{ url('product-details/' . $review->product->category->slug . '/' . $review->product->slug) }}"
                                class="btn btn-sm btn-warning float-end">Go Back</a>
                        </p>
                        <form action="{{ url('update-product-review') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="review_id" value="{{ $review->id }}">
                            <textarea class="form-control" name="user_review" rows="5" placeholder="Review product...">
                                {{ $review->user_review }}
                            </textarea>
                            <button type="submit" class="btn btn-info float-end mt-3 px-3">Update Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
