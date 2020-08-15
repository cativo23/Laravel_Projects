@extends('admin.main')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Servers
        </li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Servers</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(session()->get('success'))
                            <div class="alert alert-success">
                                <p>{{ session()->get('success') }}</p>
                                <p>Maybe you'd like to add some articles, click <a href="{{route('admin.create_art_dest', session()->get('destination_art'))}}">here!</a></p>
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
                                        <div class="table-responsive">
                                            <div class="table-responsive">
                                                {{$dataTable->table()}}
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
@push('scripts')
    {{$dataTable->scripts()}}
@endpush
