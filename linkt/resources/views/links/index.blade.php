@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Links of User '.Auth::user()->name) }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                        @if(count($links)>0)
                                <a href="{{route('links.create')}}" class="btn btn-success">Add Link</a>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
