@extends('layouts.app',['message'=>$message ?? '', 'destination'=>$destination])

@section('sections', 'Restaurants')

@section('content')
    <section class="hero_in restaurants">
        <div class="wrapper">
            <div id="slider" class="flexslider ">
                <ul class="slides">
                    <li>
                        <img src="/img/video_fix.png" alt="" class="header-video--media" data-video-src="video/hero" data-teaser-source="video/hero" data-provider="" data-video-width="1920" data-video-height="960" autoplay preload muted>
                        <video autoplay="true" loop="loop" muted="false" id="teaser-video" class="teaser-video">
                            <source src="/video/USA Hero.mp4" type="video/mp4">
                            <source src="/video/hero.ogv" type="video/ogg">
                            <source src="/video/hero.webm" type="video/webm"></video>
                        <div class="container">
                            <div class="meta">
                                <div id="mute" class="btn" style="background-size: 50px; padding-bottom: 50px; padding-left: 50px; width: 5px; background-repeat: no-repeat;"></div>
                                <h1 class="fadeInUp"><span></span>Restaurants</h1>
                                <h3>USA Xperts</h3>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--/hero_in-->
    <div class="container margin_60_35">
    @foreach( $restaurants as $rest)

        <div class="box_list">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <figure>
                        <a href="restaurants/{{ $rest['alias'] }}"><img src="{{ $rest['image_url'] }}" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
                    </figure>
                </div>
                <div class="col-lg-7">
                    <div class="wrapper">
                        <h3><a href="restaurants/{{ $rest['alias'] }}">{{ $rest['name'] }}</a></h3>
                        @foreach($reviews as $rev)
                            @if($rev['id_rest'] == $rest['id'])
                                <p>"{{$rev['rev'][0]['text']}}" - {{$rev['rev'][0]['user']['name']}}</p>
                                <p>"{{$rev['rev'][1]['text']}}" - {{$rev['rev'][1]['user']['name']}}</p>
                            @endif
                        @endforeach
                        <span class="price">Price:<strong>{{ $rest['price'] ?? 'none' }}</strong> </span>
                    </div>
                    <ul>
                        <li><div class="score">{{ $rest['review_count'] }} Reviews <strong>{{ $rest['rating'] }}/5</strong></div></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
        <p class="text-center add_top_30"><a href="#0" class="btn_1 rounded">Load more</a></p>
    </div>
    <!-- /container -->
@endsection
