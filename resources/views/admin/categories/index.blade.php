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
        <h3>Hello</h3>
    </div>
@endsection
