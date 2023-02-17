@extends('frontend.master')

@section('title')
    Change Password
@endsection

@section('content')
    <div class="py-3 mb-3 shadow-sm bg-info border-top">
        <div class="container">
            <a href="{{ url('/') }}">Home</a> / Password
        </div>
    </div>
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-body">
                        <form action="{{ url('change-password') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Current Password</label>
                                <input type="password" name="current_password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    placeholder="current password">
                                @error('current_password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for=""> Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="new password">
                                @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="confirm password">
                            </div>
                            <button type="submit" class="btn btn-info float-end"> <i class="fa fa-lock"></i> Change
                                Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
