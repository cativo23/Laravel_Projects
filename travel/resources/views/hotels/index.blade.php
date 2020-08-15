@extends('admin.main')
@section('section', 'Hotels')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Hotels</li>
    </ol>
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

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-hotel"></i> Hotels</div>
        <div>
            <a style="margin: 19px;" href="{{ route('admin.hotels1.create')}}" class="btn btn-primary">New Hotel</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table width="100%" cellspacing="0" class="table table-bordered table-striped data-table">
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
                    @foreach($hotels as $do)
                        <tr>
                            <td>{{$do->id}}</td>
                            <td>{{$do->name}}</td>
                            <td>{{$do->destination->name}}</td>
                            <td>
                                <a href="{{ route('admin.hotels1.edit',$do->id)}}"
                                   class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.hotels1.destroy', $do->id)}}"
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
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
@endsection
