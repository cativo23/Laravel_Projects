@extends('layouts.app', ["place"=>"", "city"=>""])
@section('content')
    <!-- Slider -->
    <div id="full-slider-wrapper">
        <div id="layerslider" style="width:100%;height:100vh;">
            <!-- first slide -->
            <div class="ls-slide" data-ls="slidedelay: 5000; transition2d:85;">
                <video
                    autoplay
                    loop="loop"
                    muted
                    id="teaser-video"
                    class="ls-bg"
                    playsinline=""
                    onloadedmetadata="this.muted = true"
                    style="object-fit: cover;"
                >
                    <source src="{{ asset('video/USA Hero.mp4') }}" type="video/mp4">
                </video>
                <h3 class="ls-l slide_typo" style="top: 47%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;">COMING SOON</h3>
                <p class="ls-l slide_typo_2" style=
                "top:55%; left:50%;" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">We are working on this site!</p>
            </div>
        </div>
    </div>
@endsection
