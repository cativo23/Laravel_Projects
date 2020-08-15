@extends('admin.main')

@section('section', 'Update '.$destination->name)

@section('content')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        const purchased = {
            is_purchased: "{{ $purchased['is_purchased'] }}",
            message: "{{ $purchased['message'] }}"
        };
        if(purchased.is_purchased == "") {
            swal({
                icon: "error",
                text: purchased.message
            });
        }else {

        }
    </script>
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.destinations.index')}}">Destinations</a>
            </li>
            <li class="breadcrumb-item active">Update {{ $destination->name }}</li>
        </ol>

        <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST" role="form"
              enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-file"></i>Basic info</h2>
                    @if(!$destination->is_available)
                        <p class="text-danger"> <i class="fa fa-warning"></i>THIS SITE IS NOT READY TO SHOW ON SITE, IT'S UNDER CONSTRUCTION</p>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="title">Destination Name</label>
                            <input id="title" type="text" class="form-control" name="title"
                                   value="{{$destination->name}}"
                                   placeholder="Destination Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fodor_id">Fodor's ID</label>
                            <input id="fodor_id" type="text" class="form-control" name="fodor_id" disabled
                                   value="{{$destination->fodor_id}}"
                                   placeholder="The ID this destination would have if it was at Fodor's">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="site_id">Parent {{$destination->parent_id}}</label>
                            <input type="text"
                                   name="destination_id_fake"
                                   class="form-control destapi"
                                   placeholder="Destination" value="@if($destination->dad()) {{$destination->dad()->name}} @endif">
                            <input hidden name="site_id" class="destination_real" value="{{$destination->parent_id}}">
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="link_external">Domain</label>
                            <input id="link_external" name="link_external" type="text" class="form-control"
                                   value="{{$destination->link_external}}"
                                   placeholder="Ex: https://destinationxpertz.com">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" name="email" placeholder="Ex: info@destinationxpertz.com" type="text"
                                   value="{{$destination->email}}"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sequence">Parent Priority Listing</label>
                            <div class="styled-select">
                            <select name="sequence" id="sequence" class="form-control">
                                <option value="">Select One</option>
                                @for($i=0; $i<count($destination->siblings());$i++)
                                    <option value="{{$i}}" @if($destination->sequence == $i) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="intro_text">Intro Text</label>
                            <textarea id="intro_text" type="text" class="form-control editor" rows="5"
                                      name="intro_text">{{$destination->overview->text}}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="imageHeaderDropzone">Hero Image <span class="text-muted">(980x650)</span></label>
                            <div class="dropzone dropzone-previews" id="imageHeaderDropzone"></div>
                            <input id="image_header" type="hidden" value="{{$destination->image_header}}" name="image_header">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="imageHeaderThumbDropzone">Hero Image Thumbnail <span class="text-muted">(400x200)</span></label>
                            <div class="dropzone dropzone-previews" id="imageHeaderThumbDropzone"></div>
                            <input id="image_header_thumbnail" value="{{$destination->image_header_thumbnail}}" type="hidden" name="image_header_thumbnail">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="heroVideoDropzone">Hero Video</label>
                            <div class="dropzone dropzone-previews" id="heroVideoDropzone"></div>
                            <input id="hero_video" type="hidden" value="{{$destination->hero_video}}" name="hero_video">
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Logo</label>
                            <div class="dropzone dropzone-previews" id="logoDropzone"></div>
                            <input id="logo" type="hidden" class="form-control" value="{{$destination->logo}}" name="logo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Logo Sticky</label>
                            <div class="dropzone dropzone-previews" id="logoStickyDropzone"></div>
                            <input id="logo_sticky" type="hidden" class="form-control" value="{{$destination->logo_sticky}}" name="logo_sticky">
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
                        <table id="pricing-list-containernew" style="width:100%;">
                            @foreach($destination->things2Do as $tour)
                                <tr class="pricing-list-itemnew">
                                    <td>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="things_title[{{$tour->id}}]" class="form-control" value="{{$tour->title}}"
                                                           placeholder="Title">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="things_link[{{$tour->id}}]" class="form-control" value="{{$tour->link}}"
                                                           placeholder="Link">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group" >
                                                <textarea rows="5" type="text" name="things_description[{{$tour->id}}]"
                                                          class="form-control" placeholder="Description...">{{$tour->intro}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" style="overflow: auto">
                                                    <input type="file" name="things_image[{{$tour->id}}]" class="form-control">
                                                    @if($tour->image) <code>{{$tour->image}}</code> @endif
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
                            @endforeach
                        </table>
                        <a href="#0" class="btn_1 gray add-pricing-list-itemnew"><i class="fa fa-fw fa-plus-circle"></i>Add
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
                        <table id="pricing-list-container2new" style="width:100%;">
                            @foreach($destination->hotels as $hotel)
                                <tr class="pricing-list-item2new">
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" name="hotels_title[{{$hotel->id}}]" value="{{$hotel->name}}" class="form-control"
                                                           placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" name="hotels_link[{{$hotel->id}}]" value="{{$hotel->link}}" class="form-control"
                                                           placeholder="Link">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group" style="overflow: auto">
                                                    <input type="file" name="hotels_image[{{$hotel->id}}]" class="form-control">
                                                    @if($hotel->image) <code>{{$hotel->image}}</code> @endif
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
                            @endforeach
                        </table>
                        <a href="#0" class="btn_1 gray add-pricing-list-item2new"><i class="fa fa-fw fa-plus-circle"></i>Add
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
                                                                                   required
                                                                                   class="form-control"
                                                                                   @if(count($destination->galleries)>0) value="{{$destination->galleries[0]->name}}" @endif
                                                                                   placeholder="Gallery Title"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"><h6>Images</h6>
                                <table id="pricing-list-container3new" style="width:100%;">
                                    <tbody>
                                   @if(count($destination->galleries)>0)
                                       @foreach($destination->galleries[0]->images as $image)
                                           <tr class="pricing-list-item3new">
                                               <td>
                                                   <div class="row">
                                                       <div class="col-md-6">
                                                           <div class="form-group" style="overflow: auto"><input type="file" class="form-control"
                                                                                                                 name="image_gallery[]"></div>
                                                           @if($image->image) <code>{{$image->image}}</code> @endif

                                                       </div>
                                                       <div class="col-md-4">
                                                           <div class="form-group"><input type="text" class="form-control"
                                                                                          name="caption_image[]"
                                                                                          value="{{$image->title}}"
                                                                                          placeholder="Caption"></div>
                                                       </div>
                                                       <div class="col-md-2">
                                                           <div class="form-group"><a class="delete" href="#"><i
                                                                       class="fa fa-fw fa-remove"></i></a></div>
                                                       </div>
                                                   </div>
                                               </td>
                                           </tr>
                                       @endforeach
                                   @endif
                                    </tbody>
                                </table>
                                <a href="#0" class="btn_1 gray add-pricing-list-item3new"><i
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
                maxFiles: 1,
                uploadMultiple: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                init: function () {
                   @if($destination->image_header)
                    var mockFile = { name: "{{$destination->image_header}}", size: 12345, type: 'image/jpeg' };
                    this.emit("addedfile", mockFile);
                    this.options.thumbnail.call(this, mockFile, "{{$destination->image_header}}");
                    this.emit("complete", mockFile);
                    @endif
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
                        @if($destination->image_header_tumbnail)
                    var mockFile = { name: "{{$destination->image_header_tumbnail}}", size: 12345, type: 'image/jpeg' };
                    this.emit("addedfile", mockFile);
                    this.options.thumbnail.call(this, mockFile, "{{$destination->image_header_tumbnail}}");
                    this.emit("complete", mockFile);
                    @endif
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
                    @if($destination->logo)
                    var mockFile = { name: "{{$destination->logo}}", size: 12345, type: 'image/jpeg' };
                    this.emit("addedfile", mockFile);
                    this.options.thumbnail.call(this, mockFile, "{{$destination->logo}}");
                    this.emit("complete", mockFile);
                    @endif
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
                        @if($destination->logo)
                    var mockFile = { name: "{{$destination->logo_sticky}}", size: 12345, type: 'image/jpeg' };
                    this.emit("addedfile", mockFile);
                    this.options.thumbnail.call(this, mockFile, "{{$destination->logo_sticky}}");
                    this.emit("complete", mockFile);
                    @endif
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
                        @if($destination->hero_video)
                    var mockFile = { name: "{{$destination->hero_video}}", size: 12345, type: 'video/mp4' };
                    this.emit("addedfile", mockFile);
                    this.options.thumbnail.call(this, mockFile, "{{$destination->hero_video}}");
                    this.emit("complete", mockFile);
                    @endif
                    this.on("success", function (file, response) {
                        alert("Video Uploaded Correctly!");
                        console.log(response["path"])
                        $('#hero_video').val(response["path"]);
                    });
                }
            });
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

        let use_viator_t2d = $("#use_viator_t2d")

        .on('ifChecked', function () {
            console.log("checked");
            use_viator_t2d.val(1);
            console.log(use_viator_t2d.val());
        });

        use_viator_t2d.on('ifUnchecked', function () {
            console.log("unchecked");
            use_viator_t2d.val(0);
            console.log(use_viator_t2d.val());
        });
        let use_experience_more = $("#use_experience_more")
        use_experience_more.on('ifChecked', function () {
            console.log("checked");
            use_experience_more.val(1);
            console.log(use_experience_more.val());
        });

        use_experience_more.on('ifUnchecked', function () {
            console.log("unchecked");
            use_experience_more.val(0);
            console.log(use_experience_more.val());
        });

        @if($destination->show_on_parent)
            show_on_parent.iCheck('check');
            show_on_parent.val(1);
        @endif

        @if($destination->use_t2d)
        use_t2d.iCheck('check');
        use_t2d.val(1);
        @endif

        @if($destination->use_restaurants)
        use_restaurants.iCheck('check');
        use_restaurants.val(1);
        @endif

        @if($destination->use_bd_btn)
        use_bd_btn.iCheck('check');
        use_bd_btn.val(1);
        @endif

        @if($destination->use_hotels)
        use_hotels.iCheck('check');
        use_hotels.val(1);
        console.log(use_hotels)
        console.log(use_hotels.val())
        @endif

        @if($destination->use_gallery)
        use_gallery.iCheck('check');
        use_gallery.val(1);
        @endif

        @if($destination->use_viator_t2d)
        use_viator_t2d.iCheck('check');
        use_viator_t2d.val(1);
        @endif

        @if($destination->use_experience_more)
        use_experience_more.iCheck('check');
        use_experience_more.val(1);
        @endif

    </script>
@endpush
