@extends('auth.main')

@section('body_type', 'login_bg')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label>{{ __('E-Mail Address') }}</label>
            <input type="email" class="form-control" name="email" id="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <i class="icon_mail_alt"></i>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" id="password" value="">
            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <i class="icon_lock_alt"></i>
        </div>
        <div class="clearfix add_bottom_30">
            <div class="checkboxes float-left">
                <label class="container_check">Remember me
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="float-right mt-1"><a id="forgot" href="{{route('password.request')}}">Forgot Password?</a></div>
        </div>
        <button type="submit" href="#0" class="btn_1 rounded full-width">Login to Travel</button>
        <div class="text-center add_top_10">New to Travel? <strong><a href="{{route('register')}}">Sign up!</a></strong>
        </div>
    </form>
@endsection
