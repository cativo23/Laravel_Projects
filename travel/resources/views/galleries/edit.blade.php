@extends('admin.main')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.home')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('admin.galleries.index')}}">Galleries</a>
        </li>
        <li class="breadcrumb-item active">Edit Gallery</li>
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
    <form action="{{route('admin.galleries.update', $gallery->id)}}" method="POST" role="form" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-picture-o"></i>Gallery</h2>
            </div>
            <div class="articlesdiv">
                <div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label>Title</label><input type="text"
                                                                               name="name"
                                                                               class="form-control"
                                                                               value="{{$gallery->name}}"
                                                                               placeholder="New Gallery Title"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="destination_id">Destination {{$gallery->destination->id}}</label>
                                <div class="styled-select">
                                    <input type="text"
                                           name="destination_id_fake"
                                           class="form-control destapi"
                                           placeholder="Destination" value="{{$gallery->destination->name}}">
                                    <input hidden name="destination_id" value="{{$gallery->destination->id}}" class="destination_real">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><h6>Images</h6>
                            <table id="pricing-list-container3new" style="width:100%;">
                                <tbody>
                                    @foreach($gallery->images as $image)
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
                                </tbody>
                            </table>
                            <a href="#0" class="btn_1 gray add-pricing-list-item3new"><i
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
