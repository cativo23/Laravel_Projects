@extends('admin.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update Article on Main Site</div>
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
                                    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" role="form" enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                       <div class="form-group row">
                                        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                                        <div class="col-md-6">
                                            <input id="title" type="text" class="form-control" name="title" value="{{$article->title}}">
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="text" class="col-md-4 col-form-label text-md-right">Text</label>
                                    <div class="col-md-6">
                                        <input id="text" type="text" class="form-control" name="text" value="{{$article->text}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quote" class="col-md-4 col-form-label text-md-right">Quote</label>
                                    <div class="col-md-6">
                                        <input id="quote" type="text" class="form-control" name="quote" value="{{$article->quote}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                                    <div class="col-md-6">
                                        <input id="image" type="file" class="form-control" name="image">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>
                                    <div class="col-md-6">
                                        <select id="type" class="form-control" name="type">
                                            <option value="">Select One</option>
                                            <option value="do" @if($article->type == 'do') selected @endif>Things To Do</option>
                                            <option value="rest"  @if($article->type == 'rest') selected @endif>Restaurants</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="destination_id" class="col-md-4 col-form-label text-md-right">Site</label>
                                    <div class="col-md-6">
                                        <select id="destination_id" class="form-control" name="destination_id">
                                            <option value="">Select One</option>
                                            @foreach($sites as $site)
                                                <option value="{{$site->id}}" @if($article->destination_id == $site->id) selected @endif>{{$site->name}}</option>
                                            @endforeach
                                        </select>
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
