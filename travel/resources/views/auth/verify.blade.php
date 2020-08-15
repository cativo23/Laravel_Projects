@extends('auth.main')

@section('body_type', 'register_bg')

@section('content')

    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            <p>{{ __('A fresh verification link has been sent to your email address.') }}</p>
        </div>
    @endif

    <p>{{ Auth::user()->name}}, </p>

    <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        <p> @csrf
        {{ __('If you did not receive the email') }},
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
        </p>
    </form>
@endsection
