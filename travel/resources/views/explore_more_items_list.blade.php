@extends('layouts.app',['message'=>$message ?? '', 'destination'=> $destination])

@section('section', $type)

@section('content')
    @component('layouts.components.general.hero_video_general', ['destination'=> $destination])
    @endcomponent

    <div class="collapse" id="collapseMap">
        <div id="map" class="map"></div>
    </div>
    <!-- End Map -->

    <div class="container margin_60_35">
        <div class="row">
            <aside class="col-lg-3" id="sidebar">
                <div id="filters_col">
                    <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">Category </a>
                    <div class="collapse" id="collapseFilters">
                        <div class="filter_type">
                            <ul>
                                <li>
                                    <label>
                                        <input data-filter="*" id="all-items" type="checkbox" class="icheck" checked><strong><span>All</span></strong><small></small>
                                    </label>
                                </li>
                                @foreach($keywords as $keyword)
                                    <li>
                                        <label>
                                            <input data-filter=".{{str_replace(' ', '', str_replace('/','-', $keyword->name))}}" type="checkbox" class="icheck swag">
                                            <strong>{{$keyword->name}}</strong><small>({{$keyword->count}})</small>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--/collapse -->
                </div>
                <div id="filters_col">
                    <a data-toggle="collapse" href="#collapseFilters2" aria-expanded="false" aria-controls="collapseFilters2" id="filters_col_bt">Area </a>
                    <div class="collapse" id="collapseFilters2">
                        <div class="filter_type">
                            <ul>
                                <li>
                                    <label>
                                        <input data-filter="*" id="all-itemsf" type="checkbox" class="icheck" checked>All<small></small>
                                    </label>
                                </li>
                                @foreach($areas as $area)
                                    <li>
                                        <label>
                                            <input data-filter=".{{str_replace(' ', '', str_replace('/','-', $area->name))}}" type="checkbox" class="icheck swag">
                                            <strong>{{$area->name}} </strong><small>({{$area->count}})</small>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--/collapse -->
                </div>
                <!--/filters col-->
            </aside>
            <!-- /aside -->

            <div class="col-lg-9" id="list_sidebar">
                <div class="isotope-wrapper">

                    @foreach($info as $sight)
                        <div class="box_list isotope-item @foreach($sight->keywords as $keyword) {{str_replace(' ', '', str_replace('/','-', $keyword->name))}} @endforeach @foreach($sight->destinations as $dest) {{str_replace(' ', '', str_replace('/','-', $dest->name))}} @endforeach" style="min-height: 100px!important;">
                            <div class="row no-gutters">
                                <div class="col-lg-12">
                                    <div class="wrapper" style="min-height: 100px;">
                                        <h3><a class="addHolder" holder="{{$sight->fodor_id}}" href="">{{$sight->name}}</a></h3>
                                        <p>{!! $sight->review_snippet ?? 'Review not available at this moments, sorry for the inconvenience. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' !!}</p>
                                        <span class="price">
                                            <i class="icon_map"></i>
                                            {{str_replace("|", ", ", $sight->destinations[0]->name_path )}}
                                        </span>
                                    </div>
                                    <ul>
                                        <li>
                                        </li>
                                        <li><div class="score">
                                                @foreach($sight["KEYWORDS"] as $keyword)
                                                    @if($keyword["NAME"] !=$keyword["PARENT_NAME"])
                                                        @if($keyword["NAME"]=== "Fodor's Choice")
                                                            <strong>Xpertz Choice</strong>
                                                            @else
                                                            <strong>{{$keyword["NAME"]}}</strong>
                                                        @endif
                                                    @endif
                                                    @endforeach
                                            </div></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /box_list -->
                    @endforeach
                </div>
                <!-- /isotope-wrapper -->

                <p class="text-center add_top_30"><a href="#0" class="btn_1 rounded">Load more</a></p>
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
@endsection
