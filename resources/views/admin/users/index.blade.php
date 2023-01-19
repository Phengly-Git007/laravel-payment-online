@extends('admin.master')
@section('title')
    User
@endsection

@section('header')
    All User Management
@endsection

@section('user')
    active
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card table-responsive">
            <div class="card-body">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Create_At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><span class="right badge badge-primary">{{ $user->name }}</span></td>
                                <td><span class="right badge badge-info">{{ $user->email }}</span></td>
                                <td>
                                    <span class="right badge badge-{{ $user->phone ? 'secondary' : 'danger' }}">
                                        {{ $user->phone ? $user->phone : 'No Number' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="right badge badge-{{ $user->role ? 'success' : 'primary' }}">
                                        {{ $user->role ? 'Admin' : 'User Register' }}
                                    </span>
                                </td>
                                <td>{{ date('d-M-Y', strtotime($user->created_at)) }}</td>
                                <td>
                                    <a href="" class="btn btn-xs btn-info"><i class="fas fa-eye"></i> Update</a>
                                    <a href="" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
