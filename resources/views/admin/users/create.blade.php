@extends('admin.master')


@section('title')
    Create User
@endsection

@section('user')
    active
@endsection


@section('content')
    <div class="container-fluid px-3">
        <div class="card shadow" style="background-color: rgb(229, 237, 238)">
            <div class="card-header">
                <span>Form Create New User <a href="{{ route('users.index') }}" class="float-right">Back To User</a></span>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror "
                            placeholder="username">
                        @error('name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror "
                            placeholder="email">
                        @error('email')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror "
                            placeholder="password">
                        @error('password')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">User Role</label>
                        <select name="role" class="form-control">
                            <option value="">Select User Role</option>
                            <option value="0">User Register</option>
                            <option value="1">Admin Dashboard</option>
                        </select>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
