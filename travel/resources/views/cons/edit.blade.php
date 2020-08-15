@extends('admin.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update Cons on Main Site</div>
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
                                    <form action="{{ route('admin.pros.update', $cons->id) }}" method="POST"
                                          role="form" enctype="multipart/form-data">
                                        @method('PATCH')
                                        @csrf
                                        <div class="form-group row">
                                            <label for="title"
                                                   class="col-md-4 col-form-label text-md-right">Text</label>
                                            <div class="col-md-6">
                                                <input id="title" type="text" class="form-control" name="title"
                                                       value="{{$cons->text}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="poi_id"
                                                   class="col-md-4 col-form-label text-md-right">POI</label>
                                            <div class="col-md-6">
                                                <input id="poi_id" type="text" class="form-control" name="poi_id" value="{{$cons->point_of_interest_id}}">
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
