@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome '.Auth::user()->name.', you are logged in!') }}

                        <p>This is your Linkt: <a href="{{route('linkt', Auth::user()->username) }}">{{ route('linkt', Auth::user()->username)}}</a> </p>

                        <p>Here are your latest links: </p>

                        <div class="row">
                            <div class="col-md-6">
                                @if(count($links)>0)
                                    <ul>
                                        @foreach($links as $link)
                                            <li>
                                                <a href="{{ route('links.show', $link->id) }}">{{$link->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No Link added, add <a href="{{route('links.create')}}">one</a>.</p>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a class="card-link" href="{{ route('links.index') }}">See all Links</a>
                                <a class="card-link" href="{{ route('links.create') }}">Add new Link</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
