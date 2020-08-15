@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Link '.$link->name) }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if ($errors)
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors as $error)
                                    {{$error}}
                                @endforeach
                            </div>
                        @endif
                        <form method="POST" action="{{ route('links.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label  class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    {{$link->name}}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('URL') }}</label>

                                <div class="col-md-6">
                                    {{$link->url}}
                                </div>
                            </div>

                            <div class="form-group row mb-0 offset-md-3">
                                <div class="col-md-6">
                                    <a href="{{route('links.edit', $link)}}" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                            <form action="{{route('links.destroy', $link)}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
