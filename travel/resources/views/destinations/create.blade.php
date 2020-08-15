@extends('admin.main')
@section('section', 'Create Destination')
@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.destinations.index')}}">Destinations</a>
            </li>
            <li class="breadcrumb-item active">Create Destination</li>
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
        <form action="{{ route('admin.destinations.store') }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-file"></i>Basic info</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="title">Destination Name</label>
                            <input id="title" type="text" class="form-control" name="title"
                                   placeholder="Destination Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fodor_id">Fodor's ID</label>
                            <input id="fodor_id" type="text" class="form-control" name="fodor_id" value="{{$next_fodor_id}}" disabled
                                   placeholder="The ID this destination would have if it was at Fodor's">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="parent_id">Parent</label>
                            <input type="text"
                                   name="destination_id_fake"
                                   class="form-control destapi"
                                   placeholder="Destination">
                            <input hidden name="parent_id" class="destination_real">
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="link_external">Domain</label>
                            <input id="link_external" name="link_external" type="text" class="form-control"
                                   placeholder="Ex: https://destinationxpertz.com">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" name="email" placeholder="Ex: info@destinationxpertz.com" type="text"
                                   class="form-control">
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="intro_text">Intro Text</label>
                            <textarea id="intro_text" type="text" class="form-control editor" rows="5"
                                      name="intro_text"></textarea>
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="imageHeaderDropzone">Hero Image  <span class="text-muted">(980x650)</span></label>
                            <div class="dropzone dropzone-previews" id="imageHeaderDropzone"></div>
                            <input id="image_header" type="hidden" name="image_header">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="imageHeaderThumbDropzone">Hero Image Thumbnail <span class="text-muted">(400x200) </span></label>
                            <div class="dropzone dropzone-previews" id="imageHeaderThumbDropzone"></div>
                            <input id="image_header_thumbnail" type="hidden" name="image_header_thumbnail">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="heroVideoDropzone">Hero Video</label>
                            <div class="dropzone dropzone-previews" id="heroVideoDropzone"></div>
                            <input id="hero_video" type="hidden" name="hero_video">
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Logo</label>
                            <div class="dropzone dropzone-previews" id="logoDropzone"></div>
                            <input id="logo" type="hidden" class="form-control" name="logo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Logo Sticky</label>
                            <div class="dropzone dropzone-previews" id="logoStickyDropzone"></div>
                            <input id="logo_sticky" type="hidden" class="form-control" name="logo_sticky">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="show_on_parent">Show On Parent</label>
                            <input type="checkbox" id="show_on_parent" name="show_on_parent" class="icheck">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="use_t2d">Show Things To Do</label>
                            <input type="checkbox" id="use_t2d" name="use_t2d" class="icheck">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="use_restaurants">Show Restaurants</label>
                            <input type="checkbox" id="use_restaurants" name="use_restaurants" class="icheck">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="use_bd_btn">Show BD Buttons</label>
                            <input type="checkbox" id="use_bd_btn" name="use_bd_btn" class="icheck">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="use_hotels">Show Hotels</label>
                            <input type="checkbox" id="use_hotels" name="use_hotels" class="icheck">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="use_gallery">Show Gallery</label>
                            <input type="checkbox" id="use_gallery" name="use_gallery" class="icheck">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="use_viator_t2d">Show Viator Things2Do</label>
                            <input type="checkbox" id="use_viator_t2d" name="use_viator_t2d" class="icheck">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="use_experience_more">Show Experience More</label>
                            <input type="checkbox" id="use_experience_more" name="use_experience_more" class="icheck">
                        </div>
                    </div>
                </div>
                <!-- /row-->
            </div>
            <!-- /box_general-->
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-map-pin"></i>Things To Do</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h6>Items</h6>
                        <table id="pricing-list-container" style="width:100%;">
                            <tr class="pricing-list-item">
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="things_title[]" class="form-control"
                                                       placeholder="Title">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="things_link[]" class="form-control"
                                                       placeholder="Link">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
    <textarea rows="5" type="text" name="things_description[]"
              class="form-control" placeholder="Description..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="file" name="things_image[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <a href="#0" class="btn_1 gray add-pricing-list-item"><i class="fa fa-fw fa-plus-circle"></i>Add
                            Item</a>
                    </div>
                </div>
                <!-- /row-->
            </div>
            <!-- /box_general-->
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-hotel"></i>Hotels</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h6>Item</h6>
                        <table id="pricing-list-container2" style="width:100%;">
                            <tr class="pricing-list-item2">
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="hotels_title[]" class="form-control"
                                                       placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="hotels_link[]" class="form-control"
                                                       placeholder="Link">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="file" name="hotels_image[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <a href="#0" class="btn_1 gray add-pricing-list-item2"><i class="fa fa-fw fa-plus-circle"></i>Add
                            Item</a>
                    </div>
                </div>
                <!-- /row-->
            </div>
            <!-- /box_general-->
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-picture-o"></i>Gallery</h2>
                </div>
                <div class="articlesdiv">
                    <div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group"><label>Title</label><input type="text"
                                                                                   name="gallery_title"
                                                                                   class="form-control"
                                                                                   placeholder="Gallery Title"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><h6>Images</h6>
                                <table id="pricing-list-container3" style="width:100%;">
                                    <tbody>
                                    <tr class="pricing-list-item3">
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><input type="file" class="form-control"
                                                                                   name="image_gallery[]"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group"><input type="text" class="form-control"
                                                                                   name="caption_image[]"
                                                                                   placeholder="Caption"></div>
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
                                <a href="#0" class="btn_1 gray add-pricing-list-item3"><i
                                        class="fa fa-fw fa-plus-circle"></i>Add Item</a></div>
                        </div>
                        <!-- /row-->
                    </div>
                </div>
            </div>
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-file"></i>Website configuration</h2>
                </div>
                <div>
                    <div class="form-group">
                        <label for="update_apache_configuration">Update Apache configuration?</label>
                        <input type="checkbox" id="update_apache_configuration" name="update_apache_configuration" class="icheck"/>
                    </div>
                </div>
            </div>
            <p>
                <button type="submit" class="btn_1 medium">Save</button>
            </p>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/icheck.min.js') }}"></script>
    <script>
        Dropzone.autoDiscover = false;
        jQuery(document).ready(function () {

            $("div#imageHeaderDropzone").dropzone({
                url: "{{route('header-upload')}}",
                addRemoveLinks:true,
                maxFiles: 1,
                uploadMultiple: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                init: function () {
                    this.on("success", function (file, response) {
                        alert("Image Uploaded Correctly!");
                        console.log(response["path"]);
                        $('#image_header').val(response["path"]);
                    });
                },
                removedfile: function (file) {
                    file.previewElement.remove();
                    $('#image_header').val('');
                }
            });

            $("div#imageHeaderThumbDropzone").dropzone({
                url: "{{route('header-upload')}}",
                uploadMultiple: false,
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                init: function () {
                    this.on("success", function (file, response) {
                        alert("Image Uploaded Correctly!");
                        console.log(response["path"])
                        $('#image_header_thumbnail').val(response["path"]);
                    });
                },
                removedfile: function (file) {
                    file.previewElement.remove();
                    $('#image_header_thumbnail').val('');
                }
            });

            $("div#logoDropzone").dropzone({
                url: "{{route('header-upload')}}",
                uploadMultiple: false,
                addRemoveLinks:true,
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                init: function () {
                    this.on("success", function (file, response) {
                        alert("Image Uploaded Correctly!");
                        console.log(response["path"])
                        $('#logo').val(response["path"]);
                    });
                },
                removedfile: function (file) {
                    file.previewElement.remove();
                    $('#logo').val('');
                }
            });

            $("div#logoStickyDropzone").dropzone({
                url: "{{route('header-upload')}}",
                uploadMultiple: false,
                addRemoveLinks:true,
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                init: function () {
                    this.on("success", function (file, response) {
                        alert("Image Uploaded Correctly!");
                        console.log(response["path"])
                        $('#logo_sticky').val(response["path"]);
                    });
                },
                removedfile: function (file) {
                    file.previewElement.remove();
                    $('#logo_sticky').val('');
                }
            });

            $("div#heroVideoDropzone").dropzone({
                url: "{{route('video-upload')}}",
                uploadMultiple: false,
                addRemoveLinks:true,
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                init: function () {
                    this.on("success", function (file, response) {
                        alert("Video Uploaded Correctly!");
                        console.log(response["path"])
                        $('#hero_video').val(response["path"]);
                    });
                },
                removedfile: function (file) {
                    file.previewElement.remove();
                    $('#hero_video').val('');
                }
            });

            $("#use_restaurants").val(0);
            $("#use_t2d").val(0);
            $("#use_bd_btn").val(0);
            $("#use_hotels").val(0);
            $("#use_gallery").val(0);
            $("#use_viator_t2d").val(0);
            $("#use_experience_more").val(0);
            $("#show_on_parent").val(0);
        });

        // Check and radio input styles
        $('input.icheck').iCheck({
            checkboxClass: 'icheckbox_square-grey',
            radioClass: 'iradio_square-grey'
        });

        let use_restaurants = $("#use_restaurants");

        use_restaurants.on('ifUnchecked', function () {
            console.log("unchecked");
            use_restaurants.val(0);
            console.log(use_restaurants.val());
        });

        use_restaurants.on('ifChecked', function () {
            console.log("checked");
            use_restaurants.val(1);
            console.log(use_restaurants.val());
        });

        let show_on_parent = $("#show_on_parent");

        show_on_parent.on('ifUnchecked', function () {
            console.log("unchecked");
            show_on_parent.val(0);
            console.log(show_on_parent.val());
        });

        show_on_parent.on('ifChecked', function () {
            console.log(" show checked");
            show_on_parent.val(1);
            console.log(show_on_parent.val());
        });

        let use_t2d = $("#use_t2d");

        use_t2d.on('ifChecked', function () {
            console.log("checked");
            use_t2d.val(1);
            console.log(use_t2d.val());
        });

        use_t2d.on('ifUnchecked', function () {
            console.log("unchecked");
            use_t2d.val(0);
            console.log(use_t2d.val());
        });

        let use_bd_btn = $("#use_bd_btn");

        use_bd_btn.on('ifChecked', function () {
            console.log("checked");
            use_bd_btn.val(1);
            console.log(use_bd_btn.val());
        });

        use_bd_btn.on('ifUnchecked', function () {
            console.log("unchecked");
            use_bd_btn.val(0);
            console.log(use_bd_btn.val());
        });
        let use_hotels = $("#use_hotels");

        use_hotels.on('ifChecked', function () {
            console.log("checked");
            use_hotels.val(1);
            console.log(use_hotels.val());
        });

        use_hotels.on('ifUnchecked', function () {
            console.log("unchecked");
            use_hotels.val(0);
            console.log(use_hotels.val());
        });

        let use_gallery = $("#use_gallery");

        use_gallery.on('ifChecked', function () {
            console.log("checked");
            use_gallery.val(1);
            console.log(use_gallery.val());
        });

        use_gallery.on('ifUnchecked', function () {
            console.log("unchecked");
            use_gallery.val(0);
            console.log(use_gallery.val());
        });

        $("#use_viator_t2d").on('ifChecked', function () {
            console.log("checked");
            $("#use_viator_t2d").val(1);
            console.log($("#use_viator_t2d").val());
        });

        $("#use_viator_t2d").on('ifUnchecked', function () {
            console.log("unchecked");
            $("#use_viator_t2d").val(0);
            console.log($("#use_viator_t2d").val());
        });
        $("#use_experience_more").on('ifChecked', function () {
            console.log("checked");
            $("#use_experience_more").val(1);
            console.log($("#use_experience_more").val());
        });

        $("#use_experience_more").on('ifUnchecked', function () {
            console.log("unchecked");
            $("#use_experience_more").val(0);
            console.log($("#use_experience_more").val());
        });
    </script>
@endpush
