@extends('admin.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update activity</div>
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
                                    <form action="{{ route('admin.activities.update', $activity_send->id) }}" method="POST" role="form" enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        <div class="form-group row">
                                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                                            <div class="col-md-6">
                                                <input id="title" type="text" class="form-control" name="title" value="{{$activity_send->title}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="text" class="col-md-4 col-form-label text-md-right">Text</label>
                                            <div class="col-md-6">
                                                <textarea id="text" type="text" class="form-control" rows="10" name="text">{{$activity_send->text}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="snippet" class="col-md-4 col-form-label text-md-right">Snippet</label>
                                            <div class="col-md-6">
                                                <textarea name="snippet" id="snippet" rows="5" class="form-control">{{$activity_send->snippet}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="site_id" class="col-md-4 col-form-label text-md-right">Destination</label>
                                            <div class="col-md-6">
                                                <select id="site_id" class="form-control" name="site_id">
                                                    <option value="">Select One</option>
                                                    @foreach($destinations as $site)
                                                        <option value="{{$site->id}}" @if($activity_send->destination->id == $site->id) selected @endif>{{$site->name}}</option>
                                                    @endforeach
                                                </select>
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
