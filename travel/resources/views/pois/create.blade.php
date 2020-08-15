@extends('admin.main')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('admin.destinations.index')}}">POIS</a>
        </li>
        <li class="breadcrumb-item active">Create POI</li>
    </ol>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Create POI</h3></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
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
                                    <form action="{{ route('admin.pois.store') }}" method="POST" role="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="latitude" class="col-md-4 col-form-label text-md-right">Latitude</label>
                                            <div class="col-md-6">
                                                <input id="latitude" type="text" class="form-control" name="latitude">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="longitude" class="col-md-4 col-form-label text-md-right">Longitude</label>
                                            <div class="col-md-6">
                                                <input id="longitude" type="text" class="form-control" name="longitude">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                            <div class="col-md-6">
                                                <textarea id="email" type="text" class="form-control" rows="5" name="email"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="web" class="col-md-4 col-form-label text-md-right">Web</label>
                                            <div class="col-md-6">
                                                <textarea id="web" type="text" class="form-control" rows="5" name="web"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="review" class="col-md-4 col-form-label text-md-right">Review</label>
                                            <div class="col-md-6">
                                                <textarea id="review" type="text" class="form-control" rows="5" name="review"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="review_snippet" class="col-md-4 col-form-label text-md-right">Review Snippet</label>
                                            <div class="col-md-6">
                                                <textarea id="review_snippet" type="text" class="form-control" rows="5" name="review_snippet"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="admission" class="col-md-4 col-form-label text-md-right">Admission</label>
                                            <div class="col-md-6">
                                                <input id="admission" type="text" class="form-control" name="admission">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="card_policy" class="col-md-4 col-form-label text-md-right">Card policy</label>
                                            <div class="col-md-6">
                                                <input id="card_policy" type="text" class="form-control" name="card_policy">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="open_hours" class="col-md-4 col-form-label text-md-right">Open Hours</label>
                                            <div class="col-md-6">
                                                <input id="open_hours" type="text" class="form-control" name="open_hours">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="closed_hours" class="col-md-4 col-form-label text-md-right">closed_hours</label>
                                            <div class="col-md-6">
                                                <input id="closed_hours" type="text" class="form-control" name="closed_hours">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="longitude" class="col-md-4 col-form-label text-md-right">Longitude</label>
                                            <div class="col-md-6">
                                                <input id="longitude" type="text" class="form-control" name="longitude">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="res_policy" class="col-md-4 col-form-label text-md-right">res_policy</label>
                                            <div class="col-md-6">
                                                <input id="res_policy" type="text" class="form-control" name="res_policy">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="rooms" class="col-md-4 col-form-label text-md-right">rooms</label>
                                            <div class="col-md-6">
                                                <input id="rooms" type="text" class="form-control" name="rooms">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="meal_plans" class="col-md-4 col-form-label text-md-right">meals_plan</label>
                                            <div class="col-md-6">
                                                <input id="meal_plans" type="text" class="form-control" name="meal_plans">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="miscellaneous" class="col-md-4 col-form-label text-md-right">miscellaneous</label>
                                            <div class="col-md-6">
                                                <input id="miscellaneous" type="text" class="form-control" name="miscellaneous">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="state" class="col-md-4 col-form-label text-md-right">State</label>
                                            <div class="col-md-6">
                                                <input id="state" type="text" class="form-control" name="state">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="zip" class="col-md-4 col-form-label text-md-right">zip</label>
                                            <div class="col-md-6">
                                                <input id="zip" type="text" class="form-control" name="zip">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="country" class="col-md-4 col-form-label text-md-right">country</label>
                                            <div class="col-md-6">
                                                <input id="country" type="text" class="form-control" name="country">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="metro" class="col-md-4 col-form-label text-md-right">metro</label>
                                            <div class="col-md-6">
                                                <input id="metro" type="text" class="form-control" name="metro">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="directions" class="col-md-4 col-form-label text-md-right">directions</label>
                                            <div class="col-md-6">
                                                <input id="directions" type="text" class="form-control" name="directions">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address_string" class="col-md-4 col-form-label text-md-right">address_string</label>
                                            <div class="col-md-6">
                                                <input id="address_string" type="text" class="form-control" name="address_string">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="prefix" class="col-md-4 col-form-label text-md-right">prefix</label>
                                            <div class="col-md-6">
                                                <input id="prefix" type="text" class="form-control" name="prefix">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="street_address" class="col-md-4 col-form-label text-md-right">street_address</label>
                                            <div class="col-md-6">
                                                <input id="street_address" type="text" class="form-control" name="street_address">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="suffix" class="col-md-4 col-form-label text-md-right">suffix</label>
                                            <div class="col-md-6">
                                                <input id="suffix" type="text" class="form-control" name="suffix">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="neighborhood" class="col-md-4 col-form-label text-md-right">neighborhood</label>
                                            <div class="col-md-6">
                                                <input id="neighborhood" type="text" class="form-control" name="neighborhood">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="city" class="col-md-4 col-form-label text-md-right">city</label>
                                            <div class="col-md-6">
                                                <input id="city" type="text" class="form-control" name="city">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="site_id" class="col-md-4 col-form-label text-md-right">Class</label>
                                            <div class="col-md-6">
                                                <select id="site_id" class="form-control" name="site_id">
                                                    <option value="">Select One</option>
                                                    @foreach($classes as $site)
                                                        <option value="{{$site->id}}">{{$site->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0 mt-5">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
