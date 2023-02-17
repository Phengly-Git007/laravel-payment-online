@extends('admin.master')


@section('title')
    Create User
@endsection

@section('user')
    active
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card shadow" style="background-color: rgb(229, 237, 238)">
            <div class="card-header">
                <span>Update User Info <a href="{{ route('users.index') }}" class="float-right">Back To User</a></span>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="name" value="{{ $user->name }}"
                            class="form-control @error('name') is-invalid @enderror " placeholder="username">
                        @error('name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}"
                            class="form-control @error('email') is-invalid @enderror " placeholder="email">
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
                        <select name="role" id="role" class="form-control">
                            <option value="0" {{ $user->role == '0' ? 'selected' : '' }}>User Register
                            </option>
                            <option value="1" {{ $user->role == '1' ? 'selected' : '' }}>Admin Dashboard
                            </option>
                        </select>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
