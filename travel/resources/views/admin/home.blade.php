@extends('admin.main')

@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
    </ol>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>Welcome!</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Hi {{Auth::user()->name}}, you are logged in!
                </div>
            </div>
        </div>
@endsection
