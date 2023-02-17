@extends('admin.master')
@section('title')
    Update Setting
@endsection
@section('header')
    Update Setting
@endsection
@section('setting')
    active
@endsection
@section('content')
    <div class="container-fluid px-3">
        <div class="card table-responsive shadow" style="background-color: rgb(229, 237, 238)">
            <div class="card-body">
                <form action="{{ route('settings.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">App Name</label>
                        <input type="text" name="app_name" class="form-control @error('app_name') is-invalid  @enderror"
                            placeholder="app name" value="{{ old('app_name', config('settings.app_name')) }}">
                        @error('app_name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Currency Symbol</label>
                        <input type="text" name="currency_symbol"
                            class="form-control @error('currency_symbol') is-invalid  @enderror"
                            placeholder=" currency symbol "
                            value="{{ old('currency_symbol', config('settings.currency_symbol')) }}">
                        @error('currency_symbol')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Contact Phone</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid  @enderror"
                            placeholder="shop phone" value="{{ old('phone', config('settings.phone')) }}">
                        @error('phone')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email Address</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid  @enderror"
                            placeholder=" email address" value="{{ old('email', config('settings.email')) }}">
                        @error('email')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Socials Media</label>
                        <input type="text" name="social_media"
                            class="form-control @error('social_media') is-invalid  @enderror" placeholder=" social media "
                            value="{{ old('social_media', config('settings.social_media')) }}">
                        @error('social_media')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Shop Location</label>
                        <textarea name="location" class="form-control @error('location') is-invalid  @enderror" cols="30" rows="3"
                            placeholder="shop location">{{ old('location', config('settings.location')) }}</textarea>
                        @error('location')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success float-right">Update Setting</button>
                </form>
            </div>
        </div>
    </div>
@endsection
