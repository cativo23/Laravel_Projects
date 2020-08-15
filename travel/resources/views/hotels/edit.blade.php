@extends('admin.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update Hotels on Main Site</div>
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
                                    <form action="{{ route('admin.hotels1.update', $hotel->id) }}" method="POST" role="form" enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value="{{$hotel->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="link" class="col-md-4 col-form-label text-md-right">Link</label>
                                            <div class="col-md-6">
                                                <input id="link" type="text" class="form-control" name="link" value="{{$hotel->link}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="destination_id" class="col-md-4 col-form-label text-md-right">Site</label>
                                            <div class="col-md-6">
                                                <select id="destination_id" class="form-control" name="destination_id">
                                                    <option value="">Select One</option>
                                                    @foreach($sites as $site)
                                                        <option value="{{$site->id}}" @if($hotel->destination_id == $site->id) selected @endif>{{$site->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                                            <div class="col-md-6">
                                                <input id="image" type="file" class="form-control" name="image" value="{{ $hotel->image }}">
                                            </div>
                                            @if($hotel->image)
                                                <div class="col-md-12 align-content-md-center">
                                                    <img style="height: 200px; width: auto"  src="{{asset($hotel->image)}}" alt="{{$hotel->name}}">
                                                </div>
                                            @endif
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
