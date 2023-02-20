@extends('admin.master')
@section('title')
    Update Setting
@endsection
@section('header')
    @lang('admin.update_setting')
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
                        <label for="">@lang('admin.app_name')</label>
                        <input type="text" name="app_name" class="form-control @error('app_name') is-invalid  @enderror"
                            placeholder="app name" value="{{ old('app_name', config('settings.app_name')) }}">
                        @error('app_name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">@lang('admin.currency')</label>
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
                        <label for="">@lang('admin.contact')</label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid  @enderror"
                            placeholder="shop phone" value="{{ old('phone', config('settings.phone')) }}">
                        @error('phone')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">@lang('admin.email')</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid  @enderror"
                            placeholder=" email address" value="{{ old('email', config('settings.email')) }}">
                        @error('email')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">@lang('admin.social')</label>
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
                        <label for="">@lang('admin.shop_location')</label>
                        <textarea name="map_link" class="form-control @error('map_link') is-invalid  @enderror" cols="30" rows="2"
                            placeholder="shop map link">{{ old('map_link', config('settings.map_link')) }}</textarea>
                        @error('map_link')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">@lang('admin.shop_address')</label>
                        <textarea name="location" class="form-control @error('location') is-invalid  @enderror" cols="30" rows="3"
                            placeholder="shop location">{{ old('location', config('settings.location')) }}</textarea>
                        @error('location')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success float-right"> <i class="fas fa-save"></i>
                        @lang('admin.update_setting')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
