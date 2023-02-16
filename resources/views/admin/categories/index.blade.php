@extends('admin.master')
@section('title')
    Category Page
@endsection
@section('category')
    active
@endsection
@section('header')
    All Categories
@endsection

@section('action')
    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">Add New Category</a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card table-responsive p-0 shadow" style="background-color: rgb(229, 237, 238)">
            <div class="card-body">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Popular</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr class="w-100">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <img src="{{ Storage::url($category->image) }}" alt="image" width="50px"
                                        height="40px">
                                </td>
                                <td>
                                    <span class="right badge badge-{{ $category->status ? 'danger' : 'success' }}">
                                        {{ $category->status ? 'Disable' : 'Active' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="right badge badge-{{ $category->popular ? 'primary' : 'danger' }}">
                                        {{ $category->popular ? 'Popular' : 'Hidden' }}
                                    </span>
                                </td>
                                <td>{{ date('d-M-Y', strtotime($category->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-xs btn-info"><i
                                            class="fas fa-eye"></i> Update</a>
                                    <a class="btn btn-xs">
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                            onsubmit="return confirm('Are you sure delete, {{ $category->name }} ?')">
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
                <hr>
                <span class="float-right mx-5">
                    {{ $categories->links() }}
                </span>
            </div>
        </div>
    </div>
@endsection
