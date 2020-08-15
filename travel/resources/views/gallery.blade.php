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
                        <video autoplay="true" loop="loop" muted="false" id="teaser-video" class="teaser-video">
                            <source src="{{str_replace("travel-files.s3.amazonaws.com", "d2wg9vs674sg0m.cloudfront.net", $destination->hero_video) }}" type="video/mp4">
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
                            <h3>USA </h3>
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
            <h2>USA</h2>
            <p></p>
        </div>
        <div class="grid">
            <ul class="magnific-gallery">
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
                        <img src="{{ asset('img/gallery/Florida/Fort Lauderdale/1-Fort-Lauderdale-Florida-USA-Travel.jpg') }}" alt="">
                        <figcaption>
                            <div class="caption-content">
                                <a href="{{ asset('img/gallery/Florida/Fort Lauderdale/1-Fort-Lauderdale-Florida-USA-Travel.jpg') }}"
                                   title="Photo title" data-effect="mfp-zoom-in">
                                    <i class="pe-7s-albums"></i>
                                    <p>Fort Lauderdale, Florida, USA</p>
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="{{ asset('img/gallery/Florida/Fort Lauderdale/2-Fort-Lauderdale-Florida-USA-Travel.jpg') }}" alt="">
                        <figcaption>
                            <div class="caption-content">
                                <a href="{{ asset('img/gallery/Florida/Fort Lauderdale/2-Fort-Lauderdale-Florida-USA-Travel.jpg') }}"
                                   title="Photo title" data-effect="mfp-zoom-in">
                                    <i class="pe-7s-albums"></i>
                                    <p>Fort Lauderdale, Florida, USA</p>
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="{{ asset('img/gallery/Florida/Fort Lauderdale/3-Fort-Lauderdale-Florida-USA-Travel.jpg') }}" alt="">
                        <figcaption>
                            <div class="caption-content">
                                <a href="{{ asset('img/gallery/Florida/Fort Lauderdale/3-Fort-Lauderdale-Florida-USA-Travel.jpg') }}"
                                   title="Photo title" data-effect="mfp-zoom-in">
                                    <i class="pe-7s-albums"></i>
                                    <p>Fort Lauderdale, Florida, USA</p>
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="{{ asset('img/gallery/Florida/Fort Lauderdale/4-Fort-Lauderdale-Florida-USA-Travel.jpg') }}" alt="">
                        <figcaption>
                            <div class="caption-content">
                                <a href="{{ asset('img/gallery/Florida/Fort Lauderdale/4-Fort-Lauderdale-Florida-USA-Travel.jpg') }}"
                                   title="Photo title" data-effect="mfp-zoom-in">
                                    <i class="pe-7s-albums"></i>
                                    <p>Fort Lauderdale, Florida, USA</p>
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="{{ asset('img/gallery/Florida/Fort Lauderdale/5-Fort-Lauderdale-Florida-USA-Travel.jpg') }}" alt="">
                        <figcaption>
                            <div class="caption-content">
                                <a href="{{ asset('img/gallery/Florida/Fort Lauderdale/5-Fort-Lauderdale-Florida-USA-Travel.jpg') }}"
                                   title="Photo title" data-effect="mfp-zoom-in">
                                    <i class="pe-7s-albums"></i>
                                    <p>Fort Lauderdale, Florida, USA</p>
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="{{ asset('img/gallery/Florida/Orlando/1-Orlando-Florida-USA-Travel.jpg') }}" alt="">
                        <figcaption>
                            <div class="caption-content">
                                <a href="{{ asset('img/gallery/Florida/Orlando/1-Orlando-Florida-USA-Travel.jpg') }}"
                                   title="Photo title" data-effect="mfp-zoom-in">
                                    <i class="pe-7s-albums"></i>
                                    <p>Orlando, Florida, USA</p>
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="{{ asset('img/gallery/Florida/Orlando/2-Orlando-Florida-USA-Travel.jpg') }}" alt="">
                        <figcaption>
                            <div class="caption-content">
                                <a href="{{ asset('img/gallery/Florida/Orlando/2-Orlando-Florida-USA-Travel.jpg') }}"
                                   title="Photo title" data-effect="mfp-zoom-in">
                                    <i class="pe-7s-albums"></i>
                                    <p>Orlando, Florida, USA</p>
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="{{ asset('img/gallery/Florida/Orlando/3-Orlando-Florida-USA-Travel.jpg') }}" alt="">
                        <figcaption>
                            <div class="caption-content">
                                <a href="{{ asset('img/gallery/Florida/Orlando/3-Orlando-Florida-USA-Travel.jpg') }}"
                                   title="Photo title" data-effect="mfp-zoom-in">
                                    <i class="pe-7s-albums"></i>
                                    <p>Orlando, Florida, USA</p>
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="{{ asset('img/gallery/Florida/Orlando/4-Orlando-Florida-USA-Travel.jpg') }}" alt="">
                        <figcaption>
                            <div class="caption-content">
                                <a href="{{ asset('img/gallery/Florida/Orlando/4-Orlando-Florida-USA-Travel.jpg') }}"
                                   title="Photo title" data-effect="mfp-zoom-in">
                                    <i class="pe-7s-albums"></i>
                                    <p>Orlando, Florida, USA</p>
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="{{ asset('img/gallery/Florida/Orlando/5-Orlando-Florida-USA-Travel.jpg') }}" alt="">
                        <figcaption>
                            <div class="caption-content">
                                <a href="{{ asset('img/gallery/Florida/Orlando/5-Orlando-Florida-USA-Travel.jpg') }}"
                                   title="Photo title" data-effect="mfp-zoom-in">
                                    <i class="pe-7s-albums"></i>
                                    <p>Orlando, Florida, USA</p>
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="{{ asset('img/gallery/Florida/Miami/1-Miami-Florida-USA-Travel.jpg') }}" alt="">
                        <figcaption>
                            <div class="caption-content">
                                <a href="{{ asset('img/gallery/Florida/Miami/1-Miami-Florida-USA-Travel.jpg') }}"
                                   title="Photo title" data-effect="mfp-zoom-in">
                                    <i class="pe-7s-albums"></i>
                                    <p>Miami, Florida, USA</p>
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="{{ asset('img/gallery/Florida/Miami/2-Miami-Florida-USA-Travel.jpg') }}" alt="">
                        <figcaption>
                            <div class="caption-content">
                                <a href="{{ asset('img/gallery/Florida/Miami/2-Miami-Florida-USA-Travel.jpg') }}"
                                   title="Photo title" data-effect="mfp-zoom-in">
                                    <i class="pe-7s-albums"></i>
                                    <p>Miami, Florida, USA</p>
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="{{ asset('img/gallery/Florida/Miami/3-Miami-Florida-USA-Travel.jpg') }}" alt="">
                        <figcaption>
                            <div class="caption-content">
                                <a href="{{ asset('img/gallery/Florida/Miami/3-Miami-Florida-USA-Travel.jpg') }}"
                                   title="Photo title" data-effect="mfp-zoom-in">
                                    <i class="pe-7s-albums"></i>
                                    <p>Miami, Florida, USA</p>
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="{{ asset('img/gallery/Florida/Miami/4-Miami-Florida-USA-Travel.jpg') }}" alt="">
                        <figcaption>
                            <div class="caption-content">
                                <a href="{{ asset('img/gallery/Florida/Miami/4-Miami-Florida-USA-Travel.jpg') }}"
                                   title="Photo title" data-effect="mfp-zoom-in">
                                    <i class="pe-7s-albums"></i>
                                    <p>Miami, Florida, USA</p>
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="{{ asset('img/gallery/Florida/Miami/5-Miami-Florida-USA-Travel.jpg') }}" alt="">
                        <figcaption>
                            <div class="caption-content">
                                <a href="{{ asset('img/gallery/Florida/Miami/5-Miami-Florida-USA-Travel.jpg') }}"
                                   title="Photo title" data-effect="mfp-zoom-in">
                                    <i class="pe-7s-albums"></i>
                                    <p>Miami, Florida, USA</p>
                                </a>
                            </div>
                        </figcaption>
                    </figure>
                </li>
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
            </ul>
        </div>
        <!-- /grid gallery -->
    </div>
    <!-- /container -->

   {{-- <div class="bg_color_1">
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
