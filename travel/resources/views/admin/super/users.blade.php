@extends('admin.main')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Users
        </li>
    </ol>

    <div class="box_general padding_bottom">
        <div class="header_box version_2">
            <h2><i class="fa fa-file"></i>List of Users</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>User name</th>
                                    <th>Email</th>
                                    <th>Registered at</th>
                                    <th>Approved</th>
                                    <th>Action</th>
                                </tr>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{$user->approved_at ? 'YES': 'NO'}}</td>
                                        <td class="text-md-center"><a href="{{ $user->approved_at ? route('admin.users.disapprove', $user->id) : route('admin.users.approve', $user->id) }}"
                                               class="btn  {{ $user->approved_at ? 'btn-dark': 'btn-primary' }}">{{$user->approved_at ? 'Disapprove': 'Approve'}}</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No users found.</td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
            </div>
        </div>
    </div>
@endsection
