@extends('admin.main')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Destinations
        </li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Destinations</div>
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
    </div>
@endsection


@push('scripts')
    {{$dataTable->scripts()}}
    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
    <script>
        $(document).on("click", ".deletebtn", function () {
            $('.deletebtn').click(function () {
                console.log(this);
                let url = this.getAttribute('data-destination');
                let name = this.getAttribute('data-destination-name');
                console.log(url);
                Swal.fire({
                    icon:'warning',
                    title:'Are you sure?',
                    text: 'Are you sure you want to delete '+name+'?',
                    footer: 'THIS IS WILL DELETE ALL THE INFORMATION FROM THIS DESTINATION',
                    cancelButtonText: 'CANCEL',
                    showCancelButton: true,
                    confirmButtonText: 'DELETE',
                }).then(function (e) {

                    if (e.value === true) {
                        $.ajax({
                            type: 'DELETE',
                            url: url,
                            data: {_token: "{{ csrf_token() }}"},
                            dataType: 'JSON',
                            success: function (results) {

                                if (results.success === true) {
                                    Swal.fire("Done!",
                                        results.message, "success"
                                    );
                                    location.reload();
                                } else {
                                    Swal.fire("Error!", results.message, "error");
                                }
                            }
                        });

                    } else {
                        e.dismiss;
                    }

                }, function (dismiss) {
                    return false;
                });
            });
        })
    </script>
@endpush
