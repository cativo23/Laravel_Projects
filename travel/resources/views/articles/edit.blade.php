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
    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" role="form" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-book"></i>Edit Article</h2>
            </div>
            <div class="articlesdiv">
                <div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="title">Title</label><input type="text"
                                                                                           name="title"
                                                                                           class="form-control"
                                                                                           placeholder="Article Title" value="{{$article->title}}"></div>
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
                                                                                           placeholder="Article Title" value="{{$article->quote}}"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="type">Type</label>
                                <select id="type" class="form-control" name="type">
                                    <option value="">Select One</option>
                                    <option value="do" @if($article->type == 'do') selected @endif>Things To Do</option>
                                    <option value="rest"  @if($article->type == 'rest') selected @endif>Restaurants</option>
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
                                          name="text">{{$article->text}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><h6>Articles</h6>
                            <table id="pricing-list-container4new" style="width:100%;">
                                <tbody>
                                @foreach($article->sections as $tour)
                                <tr class="pricing-list-item4new">
                                    <td>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group"><input type="text" class="form-control" placeholder="Title"
                                                                               name="article_titles[{{$tour->id}}]" value="{{$tour->title}}"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
    <textarea rows="5" type="text" name="article_texts[{{$tour->id}}]"
              class="form-control" placeholder="Section Text...">{{$tour->text}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group"><input type="text" class="form-control" placeholder="Image Caption"
                                                                               name="article_captions[{{$tour->id}}]" value="{{$tour->caption}}"></div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group"><input type="file" class="form-control"
                                                                               name="article_images[{{$tour->id}}]"></div>
                                                @if($tour->image) <code>{{$tour->image}}</code> @endif
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group"><a class="delete" href="#"><i
                                                            class="fa fa-fw fa-remove"></i></a></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="#0" class="btn_1 gray add-pricing-list-item4new"><i
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
                        @if($article->image)
                    var mockFile = { name: "{{$article->image}}", size: 12345, type: 'image/jpeg' };
                    this.emit("addedfile", mockFile);
                    this.options.thumbnail.call(this, mockFile, "{{$article->image}}");
                    this.emit("complete", mockFile);
                    @endif
                    this.on("success", function (file, response) {
                        alert("Image Uploaded Correctly!");
                        console.log(response["path"])
                        $('#image_header').val(response["path"]);
                    });
                }
            });

        });
    </script>
@endpush
