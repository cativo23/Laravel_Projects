@extends('admin.main')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.galleries.index')}}">Articles</a>
        </li>
        <li class="breadcrumb-item active">Create Article</li>
    </ol>
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
    <form action="{{ route('admin.articles.store') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-book"></i>New Article</h2>
            </div>
            <div class="articlesdiv">
                <div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="title">Title</label><input type="text"
                                                                               name="title"
                                                                               class="form-control"
                                                                               placeholder="Article Title"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="destination_id">Destination</label>
                                <input type="text"
                                       name="destination_id_fake"
                                       class="form-control destapi"
                                       placeholder="Destination">
                                <input hidden name="destination_id" class="destination_real">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="quote">Quote</label><input type="text"
                                                                                           name="quote"
                                                                                           class="form-control"
                                                                                           placeholder="Article Title"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="type">Type</label>
                                <select id="type" class="form-control" name="type">
                                    <option value="">Select One</option>
                                    <option value="do">Things To Do</option>
                                    <option value="rest">Restaurants</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="imageHeaderDropzone">Hero Image</label>
                                <div class="dropzone dropzone-previews" id="imageHeaderDropzone"></div>
                                <input id="image_header" type="hidden" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="intro_text">Intro Text</label>
                                <textarea id="intro_text" type="text" class="form-control editor" rows="5"
                                          name="text"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><h6>Articles</h6>
                            <table id="pricing-list-container4" style="width:100%;">
                                <tbody>
                                <tr class="pricing-list-item4">
                                    <td>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group"><input type="text" class="form-control" placeholder="Title"
                                                                               name="article_titles[]"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
    <textarea rows="5" type="text" name="article_texts[]"
              class="form-control" placeholder="Section Text..."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group"><input type="text" class="form-control" placeholder="Image Caption"
                                                                               name="article_captions[]"></div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group"><input type="file" class="form-control"
                                                                               name="article_images[]"></div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group"><a class="delete" href="#"><i
                                                            class="fa fa-fw fa-remove"></i></a></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="#0" class="btn_1 gray add-pricing-list-item4"><i
                                    class="fa fa-fw fa-plus-circle"></i>Add Item</a></div>
                    </div>
                    <!-- /row-->
                </div>
            </div>
        </div>
        <p>
            <button type="submit" class="btn_1 medium">Save</button>
        </p>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('js/icheck.min.js') }}"></script>
    <script>
        Dropzone.autoDiscover = false;
        jQuery(document).ready(function () {

            $("div#imageHeaderDropzone").dropzone({
                url: "{{route('header-upload')}}",
                maxFiles: 1,
                uploadMultiple: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                init: function () {
                    this.on("success", function (file, response) {
                        alert("Image Uploaded Correctly!");
                        console.log(response["path"])
                        $('#image_header').val(response["path"]);
                    });
                }
            });

            $("div#imageHeaderThumbDropzone").dropzone({
                url: "{{route('header-upload')}}",
                uploadMultiple: false,
                maxFiles: 5,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                init: function () {
                    this.on("success", function (file, response) {
                        alert("Image Uploaded Correctly!");
                        console.log(response["path"])
                        $('#image_header_thumbnail').val(response["path"]);
                    });
                }
            });

            $("div#logoDropzone").dropzone({
                url: "{{route('header-upload')}}",
                uploadMultiple: false,
                maxFiles: 5,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                init: function () {
                    this.on("success", function (file, response) {
                        alert("Image Uploaded Correctly!");
                        console.log(response["path"])
                        $('#logo').val(response["path"]);
                    });
                }
            });

            $("div#logoStickyDropzone").dropzone({
                url: "{{route('header-upload')}}",
                uploadMultiple: false,
                maxFiles: 5,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                init: function () {
                    this.on("success", function (file, response) {
                        alert("Image Uploaded Correctly!");
                        console.log(response["path"])
                        $('#logo_sticky').val(response["path"]);
                    });
                }
            });

            $("div#heroVideoDropzone").dropzone({
                url: "{{route('video-upload')}}",
                uploadMultiple: false,
                maxFiles: 5,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                init: function () {
                    this.on("success", function (file, response) {
                        alert("Video Uploaded Correctly!");
                        console.log(response["path"])
                        $('#hero_video').val(response["path"]);
                    });
                }
            });
        });
    </script>

@endpush
