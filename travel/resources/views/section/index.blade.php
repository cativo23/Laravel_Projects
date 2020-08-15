@extends('admin.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Hotels</div>
                    <div>
                        <a style="margin: 19px;" href="{{ route('admin.sections.create')}}" class="btn btn-primary">New Section</a>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @if(session()->get('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
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
                                                <td>Article</td>
                                                <td>Edit</td>
                                                <td>Delete</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($sections as $do)
                                                <tr>
                                                    <td>{{$do->id}}</td>
                                                    <td>{{$do->title}}</td>
                                                    <td>{{$do->article->title}}</td>
                                                    <td>
                                                        <a href="{{ route('admin.sections.edit',$do->id)}}"
                                                           class="btn btn-primary">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.sections.destroy', $do->id)}}"
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
@endsection
