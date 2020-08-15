@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Linkt of '.$user->name) }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <p>Hi! It's me {{$user->name}}, this are my links:</p>

                        <div class="row">
                            <div class="col-md-6">
                                @if(count($links)>0)
                                    <ul>
                                        @foreach($links as $link)
                                            <li>
                                                <a href="{{$link->url}}">{{$link->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No Link added.</p>
                                @endif
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
