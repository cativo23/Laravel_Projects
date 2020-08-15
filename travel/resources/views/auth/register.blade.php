@extends('auth.main')

@section('body_type', 'register_bg')

@section('content')
    <form autocomplete="off" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                   value="{{ old('name') }}" required autocomplete="name" autofocus>
            <i class="ti-user"></i>
            @error('name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" required autocomplete="email">
            <i class="icon_mail_alt"></i>
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password1">{{ __('Password') }}</label>
            <input id="password1" type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" required autocomplete="new-password">
            <i class="icon_lock_alt"></i>
            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password2">Confirm password</label>
            <input id="password2" type="password" class="form-control"
                   name="password_confirmation" required autocomplete="new-password">
            <i class="icon_lock_alt"></i>
        </div>
        <div id="pass-info" class="clearfix"></div>
        <button type="submit" class="btn_1 rounded full-width add_top_30">Register Now!</button>
        <div class="text-center add_top_10">Already have an account? <strong><a href="{{route('login')}}">Sign In</a></strong>
        </div>
    </form>
@endsection

@push('js_after')
    <script src="{{asset('js/pw_strenght.js')}}"></script>
@endpush
