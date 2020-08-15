@extends('layouts.app', ['area1'=>$area1, 'destination'=>$destination])

@section('section', "Restaurants")

@section('content')
    <section class="hero_in restaurants">
        <div class="wrapper">
            <div id="slider" class="flexslider ">
                <ul class="slides">
                    <li>
                        <img src="/img/video_fix.png" alt="" class="header-video--media" data-video-src="video/hero" data-teaser-source="video/hero" data-provider="" data-video-width="1920" data-video-height="960" autoplay preload muted>
                        <video  autoplay
                                loop="loop"
                                muted
                                id="teaser-video"
                                class="teaser-video"
                                playsinline=""
                                onloadedmetadata="this.muted = true">
                            <source src="{{ str_replace("travel-files.s3.amazonaws.com", "d2wg9vs674sg0m.cloudfront.net", $destination->hero_video) }}" type="video/mp4">
                        </video>
                        <script>
                            const video = document.getElementById('teaser-video');
                            video.oncanplaythrough = function () {
                                video.muted = true;
                                video.play();
                            }
                        </script>
                        <div class="container">
                            <div class="meta">
                                <div id="mute" class="btn"
                                     style="background-size: 50px; padding-bottom: 50px; padding-left: 50px; width: 5px; background-repeat: no-repeat;"></div>
                                <h1 class="fadeInUp"><span></span>Restaurants</h1>
                                    <h3>{{$destination->name}} Xperts</h3>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--/hero_in-->



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
                    <a data-toggle="collapse" href="#collapseFilters2" aria-expanded="false" aria-controls="collapseFilters2" id="filters_col_bt">Prices </a>
                    <div class="collapse" id="collapseFilters2">
                        <div class="filter_type">
                            <ul>
                                <li>
                                    <label>
                                        <input data-filter="*" id="all-itemsff" type="checkbox" class="icheck" checked>All<small></small>
                                    </label>
                                </li>
                                @foreach($prices as $price)
                                    <li>
                                        <label>
                                            <input data-filter="@switch($price->name) @case("$").l @break @case("$$").ll @break @case("$$$").lll @break @case("$$$$").lllll @break  @endswitch" type="checkbox" class="icheck swag">
                                            <strong>{{$price->name}}</strong><small> ({{$price->count}})</small>
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
                <div class="isotope-wrapper restaurants_list">
                    @foreach( $restaurants as $rest)
                        <div class="box_list isotope-item rest_box @foreach($rest['KEYWORDS'] as $key)  {{str_replace('$$$$', 'llll', str_replace('$$$', 'lll', str_replace('$$', 'll', str_replace('$', 'l', str_replace(' ', '', str_replace('/','-', $key->name))))))}}@endforeach
                        @foreach($rest["DESTINATIONS"] as $dest)  {{str_replace(' ', '', str_replace('/','-', $dest->name))}} @endforeach">
                            <div class="row no-gutters">
                                <div class="col-lg-5">
                                    <figure>
                                        <a class="addHolder" holder="{{ $rest['alias'] }}" href=""><img src="{{ $rest['image_url'] }}" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
                                    </figure>
                                </div>
                                <div class="col-lg-7">
                                    <div class="wrapper">
                                        <h3><a class="addHolder" holder="{{ $rest['alias'] }}" href="">{{ $rest['name'] }}</a></h3>
                                                <p>{{$rest['review']}}</p>
                                        <span class="price">Price:<strong>{{ $rest['price'] ?? 'none' }}</strong> </span>
                                    </div>
                                    <ul>
                                        <li><div class="score">{{ $rest['review_count'] }} Reviews <strong>{{ $rest['rating'] }}/5</strong></div></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <p class="text-center add_top_30"><a href="#0" class="btn_1 rounded load-more">Load more</a></p>
            </div>
        </div>
    </div>
    <!-- /container -->
    {{-- Ajax Script Start --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        var main_site = "{{ url('/') }}";
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".load-more").on('click', function () {
                var _totalCurrentResult = $(".rest_box").length;
                // Ajax Request
                $.ajax({
                    url: main_site + '/load-more-res',
                    type: 'get',
                    dataType: 'json',
                    data: {
                        skip: _totalCurrentResult,
                        place: '{{$place?? $city}}',
                    },
                    beforeSend: function () {
                        $(".load-more").html('Loading...');
                    },
                    success: function (response) {
                        var _html = '';
                        console.log(response);
                        $.each(JSON.parse(response), function (index, value) {
                            let temp = '<div class="box_list isotope-item rest_box'

                            //_html += '<div class="col-xl-3 col-lg-6 col-md-6 tours_box">';
                            //_html += '<a href="tours/' + value.code + '" class="grid_item latest_adventure">';
                            //_html += '<figure>';
                            //_html += '<div class="score"><strong>' + value.rating + '/5</strong></div>';
                            //_html += '<img src="' + value.thumbnailHiResURL + '" class="img-fluid" alt=""/>';
                            // _html += '<div class="info">';
                            // _html += '<em>' + value.duration + '</em>';
                            //_html += '<h3>' + value.shortTitle + '</h3>';
                            // _html += '</div>';
                            // _html += '</figure>';
                            //_html += '</a>';
                            //_html += '</div>';
                        });
                        $(".restaurants_list").append(_html);
                        $(".load-more").html('<strong>Load More<i class="arrow_carrot-right"></i></strong>');
                    }
                });
            });
        });
    </script>
    {{-- Ajax Script End --}}
@endsection
