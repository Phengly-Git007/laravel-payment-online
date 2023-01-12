@extends('admin.master')
@section('title')
    Products Page
@endsection

@section('product')
    active
@endsection
@section('header')
    All Products
@endsection
@section('action')
    <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">New Product</a>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card table-responsive p-0">
            <div class="card-body">
                <table class="table table-hover text-nowrap ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Original Price</th>
                            <th>Selling Price</th>
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
                                    <img src="{{ Storage::url($product->image) }}" alt="image" width="40px" height="40px">
                                </td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->original_price }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>{{ $product->status }}</td>
                                <td>{{ $product->trending }}</td>
                                <td>{{ date('d-M-Y', strtotime($product->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-xs btn-info"><i
                                            class="fas fa-eye"></i> Update</a>
                                    <a class="btn btn-xs">
                                        <form action="{{ route('products.destroy', $product) }}" method="POST"
                                            onsubmit="return confirm('Are you sure delete, {{ $product->name }} ?')">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-xs btn-danger"><i
                                                    class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
