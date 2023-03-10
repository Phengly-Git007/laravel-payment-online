@extends('admin.master')
@section('title')
    Products Page
@endsection

@section('product')
    active
@endsection
@section('header')
    @lang('admin.all_product')
@endsection
@section('action')
    <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> @lang('admin.new_product')</a>
@endsection
@section('content')
    <div class="container-fluid px-3">
        <div class="card table-responsive p-0 shadow" style="background-color: rgb(229, 237, 238)">
            <div class="card-header">
                <form action="" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <label for=""></label>
                            <select name="category_id" name="name" class="form-control">
                                <option value="">Show All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id ? $category->id : '' }}">
                                        {{ $category->name ? $category->name : '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mt-0">
                            <br />
                            <button type="submit" class="btn btn-warning mb-1"><i class="fas fa-search"></i>
                                @lang('admin.search')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table text-nowrap ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            {{-- <th>Category</th> --}}
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>Status</th>
                            <th>Trending</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <img src="{{ Storage::url($product->image) }}" alt="image" width="40px"
                                        height="40px">
                                </td>
                                {{-- <td>{{ $product->category->name ? $product->category->name : 'No Category' }}</td> --}}
                                <td><span class="right badge badge-{{ $product->quantity ? 'info' : 'warning' }}">
                                        {{ $product->quantity ? $product->quantity . ' In stock' : 'Out Of Stock' }}
                                    </span>
                                </td>
                                <td>$ {{ $product->original_price }}</td>
                                <td>$ {{ $product->selling_price }}</td>
                                <td>
                                    <span class="right badge badge-{{ $product->status ? 'danger' : 'success' }}">
                                        {{ $product->status ? 'Disable' : 'Active' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="right badge badge-{{ $product->trending ? 'primary' : 'danger' }}">
                                        {{ $product->trending ? 'Trending' : 'Hidden' }}
                                    </span>
                                </td>
                                <td>{{ date('d-M-Y', strtotime($product->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product) }}"
                                        class="btn btn-xs btn-secondary mr-1"><i class="fas fa-eye"></i>
                                        @lang('admin.detail')</a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-xs btn-info"> <i
                                            class="fas fa-solid fa-pen"></i> @lang('admin.edit')</a>
                                    <a class="btn btn-xs">
                                        <form action="{{ route('products.destroy', $product) }}" method="POST"
                                            onsubmit="return confirm('Are you sure delete, {{ $product->name }} ?')">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-xs btn-danger"><i
                                                    class="fas fa-trash"></i> @lang('admin.delete')</button>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <div class="float-right px-5">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
