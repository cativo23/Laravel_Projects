@extends('auth.main')
@section('body_type', 'register_bg')
@section('content')
    <p>Waiting for Approval</p>

    <p>
        {{Auth::user()->name}},your account is waiting for our administrator approval.
        <br/>
        Please check back later.
    </p>

    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

@endsection
