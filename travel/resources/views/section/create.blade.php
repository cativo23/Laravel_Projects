@extends('admin.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Section on Main Site</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>
                                                        {{ $error }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('admin.sections.store') }}" method="POST" role="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                                            <div class="col-md-6">
                                                <input id="title" type="text" class="form-control" name="title">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="text" class="col-md-4 col-form-label text-md-right">Text</label>
                                            <div class="col-md-6">
                                                <input id="text" type="text" class="form-control" name="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="caption" class="col-md-4 col-form-label text-md-right">Caption</label>
                                            <div class="col-md-6">
                                                <input id="caption" type="text" class="form-control" name="caption">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="article_id" class="col-md-4 col-form-label text-md-right">Article</label>
                                            <div class="col-md-6">
                                                <select id="article_id" class="form-control" name="article_id">
                                                    <option value="">Select One</option>
                                                    @foreach($articles as $site)
                                                        <option value="{{$site->id}}">{{$site->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                                            <div class="col-md-6">
                                                <input id="image" type="file" class="form-control" name="image">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0 mt-5">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
