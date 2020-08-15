@extends('admin.main')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Galleries
        </li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Galleries</h3></div>
                    <div>
                        <a style="margin: 19px;" href="{{ route('admin.galleries.create')}}" class="btn btn-success">New Gallery</a>
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
                                        <table class="table table-striped data-table">
                                            <thead>
                                            <tr>
                                                <td>ID</td>
                                                <td>Name</td>
                                                <td>Destination</td>
                                                <td>Edit</td>
                                                <td>Delete</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($galleries as $do)
                                                <tr>
                                                    <td>{{$do->id}}</td>
                                                    <td>{{$do->name}}</td>
                                                    <td>{{$do->destination->name}}</td>
                                                    <td>
                                                        <a href="{{ route('admin.galleries.edit',$do->id)}}"
                                                           class="btn btn-primary">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.galleries.destroy', $do->id)}}"
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
