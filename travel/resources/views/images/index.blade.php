@extends('admin.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Images</div>
                    <div>
                        <a style="margin: 19px;" href="{{ route('admin.images.create')}}" class="btn btn-primary">New Image</a>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            @if(session()->get('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
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
                                    <div class="col-12">
                                        <table class="table table-striped data-table dataTable dataTables_scrollHead">
                                            <thead>
                                            <tr>
                                                <td>ID</td>
                                                <td>Title</td>
                                                <td>Gallery</td>
                                                <td>Edit</td>
                                                <td>Delete</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($images as $do)
                                                <tr>
                                                    <td>{{$do->id}}</td>
                                                    <td>{{$do->title}}</td>
                                                    <td>{{$do->gallery->name}}</td>
                                                    <td>
                                                        <a href="{{ route('admin.images.edit',$do->id)}}"
                                                           class="btn btn-primary">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.images.destroy', $do->id)}}"
                                                              method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
