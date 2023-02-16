@extends('admin.master')
@section('title')
    User
@endsection

@section('header')
    All User Management
@endsection

@section('action')
    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary"> <i class="fas fa-plus"></i> New User</a>
@endsection

@section('user')
    active
@endsection

@section('content')
    <div class="container-fluid px-3">
        <div class="card table-responsive shadow" style="background-color: rgb(229, 237, 238)">
            <div class="card-header">
                <form action="" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Filter By Search : </label>
                            <input type="Search" name="search_name" class="form-control" placeholder="Search Name...">
                        </div>
                        <div class="col-md-3 mt-2">
                            <br />
                            <button type="submit" class="btn btn-warning mb-1"><i class="fas fa-search"></i>
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>User Role</th>
                            <th>Create_At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="right badge badge-{{ $user->phone ? 'secondary' : 'danger' }}">
                                        {{ $user->phone ? $user->phone : 'no number' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="right badge badge-{{ $user->role ? 'success' : 'primary' }}">
                                        {{ $user->role ? 'Admin' : 'User' }}
                                    </span>
                                </td>
                                <td>{{ date('d-M-Y', strtotime($user->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-xs btn-info"><i
                                            class="fas fa-eye"></i> Update</a>
                                    <a class="btn btn-xs">
                                        <form action="{{ route('users.destroy', $user) }}" method="POST"
                                            onsubmit="return confirm('Are you sure ?')">
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
