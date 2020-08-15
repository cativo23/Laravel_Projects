@extends('layouts.app', ['message'=>$message ?? '', 'destination'=>$destination])

@section('section', 'Media Gallery')

@section('content')
    <section class="hero_in hotels">
        <div class="wrapper">
            <div id="slider" class="flexslider ">
                <ul class="slides">
                    <li>
                        <img src="/img/video_fix.png" alt="" class="header-video--media" data-video-src="video/hero"
                             data-teaser-source="video/hero" data-provider="" data-video-width="1920"
                             data-video-height="960" autoplay preload muted>
                        <video
                            autoplay="true"
                            loop="loop"
                            muted="true"
                            id="teaser-video"
                            class="teaser-video"
                            onloadedmetadata="this.muted = true"
                        >
                            <source src="{{ str_replace("travel-files.s3.amazonaws.com", "d2wg9vs674sg0m.cloudfront.net", $destination->hero_video) }}" type="video/mp4">

                        </video>
                        <script>
                            const video = document.getElementById('teaser-video');
                            video.oncanplaythrough = function () {
                                video.muted = true;
                                video.play();
                            }
                        </script>
                        <div class="meta">
                            <div id="mute" class="btn"
                                 style="background-size: 50px; padding-bottom: 50px; padding-left: 50px; width: 5px; background-repeat: no-repeat;"></div>
                            <h1 class="fadeInUp"><span></span>Media Gallery</h1>
                                <h3>{{ $destination->name}} Xperts</h3>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!--/hero_in-->

    <div class="container margin_60_35">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>{{ucfirst($place)}}</h2>
            <p></p>
        </div>
        <div class="grid">
            <ul class="magnific-gallery">
                @switch($place)
                    @case("florida")
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/1-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/1-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/2-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/2-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/3-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/3-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/4-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/4-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/5-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/5-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/6-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/6-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/7-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/7-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/8-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/8-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/9-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/9-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/10-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/10-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/11-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/11-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/12-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/12-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/13-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/13-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/14-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/14-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/15-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/15-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/16-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/16-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/17-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/17-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/18-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/18-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/19-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/19-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/20-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/20-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/21-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/21-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/22-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/22-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/23-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/23-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/24-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/24-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/24-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/24-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/25-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/25-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/26-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/26-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/27-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/27-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/28-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/28-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/29-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/29-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/30-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/30-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/31-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/31-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/32-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/32-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/33-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/33-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/34-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/34-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/35-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/35-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/36-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/36-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/37-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/37-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/38-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/38-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/39-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/39-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/40-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/40-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/41-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/41-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/42-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/42-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/43-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/43-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/44-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/44-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/45-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/45-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/46-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/46-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/47-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/47-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/48-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/48-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/49-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/49-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/50-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/50-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/51-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/51-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/52-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/52-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/53-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/53-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/54-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/54-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/55-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/55-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/56-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/56-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/57-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/57-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/58-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/58-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/59-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/59-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Florida/60-Florida-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Florida/60-Florida-USA-Travel.jpg') }}"
                                       title="Florida, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Florida, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    @break
                    @case("chicago")
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/1-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/1-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/2-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/2-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/3-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/3-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/4-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/4-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/5-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/5-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/6-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/6-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/7-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/7-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/8-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/8-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/9-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/9-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/10-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/10-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/11-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/11-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/12-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/12-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/13-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/13-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/14-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/14-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/15-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/15-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/16-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/16-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/17-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/17-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/18-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/18-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/19-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/19-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/20-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/20-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/21-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/21-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/22-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/22-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/23-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/23-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/24-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/24-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/25-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/25-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/26-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/26-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/27-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/27-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/28-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/28-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/29-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/29-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/30-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/30-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Ilinois/Chicago/31-Chicago-Illinois-USA-Travel.jpg') }}"
                                 alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Ilinois/Chicago/31-Chicago-Illinois-USA-Travel.jpg') }}"
                                       title="Chicago, Illinois, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Chicago, Illinois, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    @break
                    @case("hawaii")
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/1-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/1-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/2-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/2-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/3-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/3-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/4-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/4-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/5-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/5-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/6-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/6-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/7-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/7-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/8-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/8-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/9-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/9-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/10-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/10-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/11-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/11-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/12-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/12-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/13-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/13-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/14-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/14-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/15-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/15-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/16-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/16-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/17-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/17-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/18-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/18-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/19-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/19-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/20-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/20-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/21-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/21-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/22-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/22-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/23-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/23-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/24-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/24-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/25-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/25-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/26-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/26-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/27-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/27-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/28-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/28-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/29-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/29-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/30-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/30-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/31-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/31-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/32-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/32-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/33-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/33-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/34-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/34-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/35-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/35-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/36-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/36-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/37-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/37-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/38-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/38-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/39-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/39-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/40-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/40-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/41-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/41-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/42-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/42-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/43-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/43-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/44-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/44-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/45-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/45-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/46-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/46-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/47-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/47-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/48-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/48-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/49-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/49-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/50-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/50-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/51-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/51-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/52-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/52-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/53-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/53-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/54-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/54-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/55-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/55-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/56-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/56-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/57-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/57-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/58-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/58-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/59-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/59-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/60-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/60-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/61-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/61-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/62-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/62-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/63-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/63-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/64-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/64-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/65-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/65-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/66-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/66-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/67-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/67-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/68-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/68-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/69-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/69-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/70-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/70-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/71-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/71-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/72-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/72-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/73-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/73-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/74-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/74-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/75-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/75-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/76-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/76-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/77-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/77-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/78-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/78-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/79-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/79-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/80-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/80-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/81-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/81-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/82-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/82-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/83-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/83-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/84-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/84-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/85-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/85-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/86-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/86-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/87-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/87-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/88-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/88-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/89-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/89-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/90-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/90-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/91-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/91-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/92-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/92-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/93-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/93-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/94-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/94-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/95-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/95-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/96-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/96-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/97-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/97-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/98-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/98-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/99-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/99-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/100-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/100-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/101-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/101-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/102-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/102-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/103-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/103-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/104-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/104-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/105-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/105-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/106-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/106-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/107-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/107-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/108-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/108-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/109-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/109-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/110-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/110-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/111-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/111-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/112-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/112-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/113-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/113-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/114-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/114-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Hawaii/115-Hawaii-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Hawaii/115-Hawaii-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Hawaii, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    @break

                    @case("california")
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/1-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/1-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/2-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/2-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/3-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/3-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/4-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/4-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/5-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/5-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/6-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/6-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/7-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/7-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/8-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/8-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/9-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/9-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/10-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/10-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/11-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/11-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/12-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/12-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/13-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/13-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/14-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/14-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/15-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/15-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/16-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/16-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/17-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/17-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/18-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/18-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/19-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/19-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/20-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/20-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/21-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/21-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/22-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/22-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/23-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/23-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/24-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/24-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/25-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/25-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/26-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/26-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/27-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/27-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/28-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/28-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/29-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/29-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/30-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/30-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/31-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/31-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/32-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/32-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/33-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/33-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/34-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/34-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/35-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/35-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/36-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/36-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/37-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/37-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/38-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/38-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/39-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/39-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/40-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/40-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/41-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/41-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/42-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/42-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/43-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/43-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/44-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/44-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/45-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/45-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/46-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/46-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/47-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/47-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/48-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/48-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/49-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/49-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/50-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/50-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/51-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/51-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/52-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/52-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/53-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/53-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/54-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/54-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/55-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/55-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/56-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/56-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/57-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/57-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/58-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/58-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/59-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/59-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/60-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/60-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/61-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/61-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/62-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/62-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/63-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/63-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/64-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/64-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/65-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/65-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/66-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/66-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/67-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/67-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/68-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/68-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/69-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/69-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/70-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/70-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/71-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/71-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/72-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/72-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/73-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/73-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/74-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/74-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/75-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/75-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/76-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/76-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/77-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/77-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/78-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/78-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/79-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/79-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/80-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/80-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/81-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California-81-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/82-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/82-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/83-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/83-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/84-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/84-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/85-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/85-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/86-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/86-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/California/87-California-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/California/87-California-USA-Travel.jpg') }}"
                                       title="Hawaii, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>California, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    @break

                @case("boston")
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Massachusetts/Boston/1-Boston-Massachusetts-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Massachusetts/Boston/1-Boston-Massachusetts-USA-Travel.jpg') }}"
                                       title="Boston, Massachusetts, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Boston, Massachusetts, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Massachusetts/Boston/2-Boston-Massachusetts-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Massachusetts/Boston/2-Boston-Massachusetts-USA-Travel.jpg') }}"
                                       title="Boston, Massachusetts, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Boston, Massachusetts, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Massachusetts/Boston/3-Boston-Massachusetts-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Massachusetts/Boston/3-Boston-Massachusetts-USA-Travel.jpg') }}"
                                       title="Boston, Massachusetts, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Boston, Massachusetts, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Massachusetts/Boston/4-Boston-Massachusetts-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Massachusetts/Boston/4-Boston-Massachusetts-USA-Travel.jpg') }}"
                                       title="Boston, Massachusetts, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Boston, Massachusetts, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Massachusetts/Boston/5-Boston-Massachusetts-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Massachusetts/Boston/5-Boston-Massachusetts-USA-Travel.jpg') }}"
                                       title="Boston, Massachusetts, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Boston, Massachusetts, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                @break



                    @case("washington-dc")

                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/1-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/1-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/2-Reflecting-Pool-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/2-Reflecting-Pool-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/3-Cherry-Blossoms-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/3-Cherry-Blossoms-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/4-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/4-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/5-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/5-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/6-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/6-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/7-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/7-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/8-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/8-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/9-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/9-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/10-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/10-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/11-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/11-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/12-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/12-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/13-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/13-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/14-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/14-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/15-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/15-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/16-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/16-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/17-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/17-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/18-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/18-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/19-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/19-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/20-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/20-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/21-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/21-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/22-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/22-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/23-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/23-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/24-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/24-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/25-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/25-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/26-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/26-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/27-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/27-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/28-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/28-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/29-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/29-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/30-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/30-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/31-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/31-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/32-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/32-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/33-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/33-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/34-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/34-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/35-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/35-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/36-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/36-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/37-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/37-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/38-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/38-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/39-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/39-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/40-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/40-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/41-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/41-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/42-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/42-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/43-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/43-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/44-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/44-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/45-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/45-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/46-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/46-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/47-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/47-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>

                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/48-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/48-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/49-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/49-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/50-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/50-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/51-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/51-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/52-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/52-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/WashingtonDC/Washington DC/53-Relecting-Pool-Washington-DC-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/WashingtonDC/Washington DC/53-Relecting-Pool-Washington-DC-USA-Travel.jpg') }}"
                                       title="Washington DC, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Washington DC, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    @break

                    @case("new-york-city")
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/2-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/2-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/3-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/3-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/4-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/4-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/5-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/5-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/6-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/6-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/7-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/7-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/8-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/8-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/9-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/9-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/10-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/10-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/11-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/11-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/12-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/12-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/13-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/13-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/14-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/14-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/15-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/15-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/16-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/16-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/17-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/17-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/18-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/18-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/19-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/19-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/20-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/20-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/21-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/21-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/22-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/22-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/23-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/23-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/24-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/24-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/25-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/25-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/26-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/26-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/27-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/27-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/28-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/28-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/30-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/30-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/31-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/31-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/32-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/32-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/33-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/33-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/34-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/34-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/35-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/35-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/36-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/36-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/37-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/37-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/38-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/38-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/39-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/39-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/40-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/40-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/41-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/41-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/42-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/42-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/43-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/43-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/44-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/44-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/45-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/45-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/46-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/46-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/47-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/47-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/48-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/48-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/49-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/49-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/50-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/50-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/51-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/51-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/52-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/52-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/53-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/53-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/54-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/54-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/55-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/55-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/56-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/56-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/57-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/57-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/58-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/58-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/59-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/59-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/60-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/60-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/61-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/61-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/62-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/62-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/63-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/63-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/64-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/64-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/65-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/65-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/66-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/66-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/67-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/67-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/68-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/68-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/69-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/69-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/70-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/70-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/71-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/71-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/72-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/72-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/73-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/73-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/74-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/74-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/75-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/75-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/76-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/76-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/77-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/77-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/78-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/78-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/79-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/79-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/80-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/80-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/81-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/81-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/82-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/82-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/83-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/83-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/84-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/84-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/85-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/85-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/86-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/86-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/87-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/87-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/88-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/88-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/89-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/89-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/90-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/90-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/91-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/91-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/92-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/92-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/93-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/93-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/94-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/94-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/95-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/95-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/96-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/96-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/97-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/97-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/98-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/98-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/99-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/99-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/100-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/100-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/101-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/101-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/102-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/102-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/103-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/103-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/New York/NewYorkCity/104-New-York-City-New-York-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/New York/NewYorkCity/104-New-York-City-New-York-USA-Travel.jpg') }}"
                                       title="New York City, New York, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>New York City, New York, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                @break

                @case("las-vegas")
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/1-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/1-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/2-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/2-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/3-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/3-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/4-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/4-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/5-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/5-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/6-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/6-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/7-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/7-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/8-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/8-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/9-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/9-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/10-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/10-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/11-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/11-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/12-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/12-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/13-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/13-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/14-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/14-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/15-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/15-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/16-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/16-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/17-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/17-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/18-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/18-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/19-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/19-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/20-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/20-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/21-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/21-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/22-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/22-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/23-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/23-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/24-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/24-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/25-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/25-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/26-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/26-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/27-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/27-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/28-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/28-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/29-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/29-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/30-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/30-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/31-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/31-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li><li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/32-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/32-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <img src="{{ asset('img/gallery/Las Vegas/33-Las-Vegas-Nevada-USA-Travel.jpg') }}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ asset('img/gallery/Las Vegas/33-Las-Vegas-Nevada-USA-Travel.jpg') }}"
                                       title="Las Begas, Nevada, USA" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>Las Vegas, Nevada, USA</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                @break
                    @default
                    @break
                @endswitch
            </ul>
        </div>
        <!-- /grid gallery -->
    </div>
    <!-- /container -->

 {{--  <div class="bg_color_1">
        <div class="container margin_60_35">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>Videos</h2>
                <p>You have to Xperience This!</p>
            </div>
            <div class="grid">
                <ul class="magnific-gallery">
                    @foreach($videos as $video)
                        <li>
                            <figure>
                                <img src="{{$video['snippet']['thumbnails']['high']['url']}}" alt="">
                                <figcaption>
                                    <div class="caption-content">
                                        <a href="https://www.youtube.com/watch?v={{$video['snippet']['resourceId']['videoId']}}" class="video" title="Cozumel">
                                            <i class="pe-7s-film"></i>
                                            <p>{{$video['snippet']['title']}}</p>
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- /grid -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_color_1 -->--}}
@endsection
