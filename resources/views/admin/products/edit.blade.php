@extends('admin.master')
@section('product')
    active
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card" style="background-color: rgb(159, 169, 169)">
            <div class="card-header">
                <h5 style="color: white">
                    Update Product
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-info float-right">Back To Products</a>
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" name="name" value="{{ $product->name }}"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="product name..."
                                    autofocus autocomplete="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Product Slug</label>
                                <input type="text" name="slug" value="{{ $product->slug }}"
                                    class="form-control @error('slug') is-invalid @enderror" placeholder="product slug..."
                                    autofocus autocomplete="slug">
                                @error('slug')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span>{{ $product->image }}</span>
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span for=""><b>Category</b></span>
                                <select name="categories[]" id="category" class="form-control" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected($product->categories->contains($category))>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{--  {{ $category->id == $product->category_id ? 'selected' : '' }} --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Quantity</label>
                                <input type="text" name="quantity" value="{{ $product->quantity }}"
                                    class="form-control @error('quantity') is-invalid @enderror" placeholder=" quantity..."
                                    autofocus autocomplete="quantity">
                                @error('quantity')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Original Price</label>
                                <input type="text" name="original_price" value="{{ $product->original_price }}"
                                    class="form-control @error('original_price') is-invalid @enderror"
                                    placeholder=" original price..." autofocus autocomplete="original_price">
                                @error('original_price')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Selling Price</label>
                                <input type="text" name="selling_price" value="{{ $product->selling_price }}"
                                    class="form-control @error('selling_price') is-invalid @enderror"
                                    placeholder=" selling price..." autofocus autocomplete="selling_price">
                                @error('selling_price')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Taxation</label>
                                <input type="text" name="tax" value="{{ $product->tax }}"
                                    class="form-control @error('tax') is-invalid @enderror" placeholder=" tax price..."
                                    autofocus autocomplete="tax">
                                @error('tax')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="0" {{ old('status', $product->status) === 0 ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="1" {{ old('status', $product->status) === 1 ? 'selected' : '' }}>
                                        Disable</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Trending</label>
                                <select name="trending" id="trending" class="form-control">
                                    <option value="0"
                                        {{ old('trending', $product->trending) === 0 ? 'selected' : '' }}>Hidden</option>
                                    <option value="1"
                                        {{ old('trending', $product->trending) === 1 ? 'selected' : '' }}>Trending</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Short Description</label>
                                <input type="text" name="short_description" value="{{ $product->short_description }}"
                                    class="form-control @error('short_description') is-invalid @enderror "
                                    placeholder="short description...">
                                @error('short_description')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" cols="30" rows="3"
                                    class="form-control @error('description') is-invalid @enderror " placeholder="description...">
                                    {{ $product->description }}
                                </textarea>
                                @error('description')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right"> <i class="fas fa-save"></i> Update
                        Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#category').select2();
        });
    </script>
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #d54545;
            color: #f5efef;
            border: 1px solid rgb(76, 210, )
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #eae7e7;
            cursor: pointer;
            display: inline-block;
            font-weight: bold;
            margin-right: 2px;
        }
    </style>
@endsection
