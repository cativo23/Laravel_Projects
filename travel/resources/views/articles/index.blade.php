@extends('admin.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Articles</div>
                    <div>
                        <a style="margin: 19px;" href="{{ route('admin.articles.create')}}" class="btn btn-primary">New Article</a>
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
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <td>ID</td>
                                                <td>Name</td>
                                                <td colspan=2>Actions</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($articles as $do)
                                                <tr>
                                                    <td>{{$do->id}}</td>
                                                    <td>{{$do->title}}</td>
                                                    <td>
                                                        <a href="{{ route('admin.articles.edit',$do->id)}}"
                                                           class="btn btn-primary">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.articles.destroy', $do->id)}}"
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
