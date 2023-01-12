@extends('admin.master')
@section('category')
    active
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card" style="background-color: rgb(159, 169, 169)">
            <div class="card-header">
                <h5>
                    Update New Category
                    <a href="{{ route('categories.index') }}" class="btn btn-sm btn-info float-right">Back To Categories</a>
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input type="text" name="name" value="{{ $category->name }}"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="category name..."
                                    autofocus autocomplete="name">
                                @error('name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Category Slug</label>
                                <input type="text" name="slug" value="{{ $category->slug }}"
                                    class="form-control @error('slug') is-invalid @enderror" placeholder="category slug..."
                                    autofocus autocomplete="slug">
                                @error('slug')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label for="">Category Image</label> --}}
                                <span>{{ $category->image }}</span>
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Short Description</label>
                                <input type="text" name="short_description" value="{{ $category->short_description }}"
                                    class="form-control @error('short_description') is-invalid @enderror"
                                    placeholder=" short_description..." autofocus autocomplete="short_description">
                                @error('short_description')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="0" {{ old('status', $category->status) === 0 ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="1" {{ old('status', $category->status) === 1 ? 'selected' : '' }}>
                                        Disable</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Popular</label>
                                <select name="popular" id="popular" class="form-control">
                                    <option value="0"
                                        {{ old('popular', $category->popular) === 0 ? 'selected' : '' }}>
                                        Hidden</option>
                                    <option value="1"
                                        {{ old('popular', $category->popular) === 1 ? 'selected' : '' }}>
                                        Popular</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" cols="30" rows="3"
                                    class="form-control @error('description') is-invalid @enderror " placeholder="description...">
                                    {{ $category->description }}
                                </textarea>
                                @error('description')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Update Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
