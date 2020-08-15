@extends('admin.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <meta http-equiv="refresh" content="5;url={{ route('admin.download', $destination_id) }}">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update Images from Destination</div>
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
                                            <form action="{{route('admin.update.images', $destination_id)}}" method="POST" role="form" enctype="multipart/form-data">
                                                @method('PATCH')
                                                @csrf
                                                @foreach($images_fodor as $image)
                                                <div class="form-group row">
                                                    <label for="caption[{{$image->id}}]" class="col-md-4 col-form-label text-md-right">Caption</label>
                                                    <div class="col-md-6">
                                                        <input id="caption[{{$image->id}}]" type="text" class="form-control" name="caption[{{$image->id}}]" value="{{$image->caption}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="image_url[{{$image->id}}]" class="col-md-4 col-form-label text-md-right">Image</label>
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="id[{{$image->id}}]" value="{{$image->id}}">
                                                        <input id="image_url[{{$image->id}}]" type="file" class="form-control" name="image_url[{{$image->id}}]" value="{{ $image->image_url }}">
                                                    </div>
                                                    @if($image->image_url)
                                                        <div class="col-8 center">
                                                            <img style="height: 200px; width: auto" src="{{asset($image->image_url)}}" alt="{{$image->caption}}">
                                                        </div>
                                                    @endif
                                                </div>
                                                @endforeach
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
