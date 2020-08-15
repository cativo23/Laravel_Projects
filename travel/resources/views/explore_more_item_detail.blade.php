@extends('layouts.app',['message'=>$message ?? '', 'destination'=>$destination])

@section('section', $info->name)

@section('content')
    <div id="video-container" style="position: relative;overflow: hidden; height: 480px">
        <video
            style="position: absolute;"
            id="hero-video"
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
            const video = document.getElementById('hero-video');
            video.oncanplaythrough = function () {
                video.muted = true;
                video.play();
            };
        </script>
        <div class="meta"
             style="position: absolute; bottom: 10%; left: 60px; color: #fff;display: flex;flex-direction: column;justify-content: flex-start;align-items: flex-start;font-weight: 500;z-index: 99;padding-right: 45px;">
            <div id="mute" class="btn"
                 style="background-size: 50px; padding-bottom: 50px; padding-left: 50px; width: 5px; background-repeat: no-repeat;"></div>
            <h1 style="color: white;">{{$info->name}}</h1>
        </div>
    </div>
    <!--/hero_in-->
    <div class="bg_color_1">
        <nav class="secondary_nav sticky_horizontal">
            <div class="container">
                <ul class="clearfix">
                    <li><a href="#description" class="active">Description</a></li>
                    <li><a href="#reviews" class="active">Review</a></li>
                    <li><a href="#reviews" class="active">Review</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- /container -->

    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-12">
                <section id="description">
                    <h2>Description</h2>
                    <h3>Details</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="bullets">
                                <li>
                                    <strong>Admission:</strong> {{$info->admission ?? 'No Information Available'}}
                                </li>
                                <li><strong>Card
                                        Policy:</strong> {{$info->card->policy?? 'No Information Available'}}
                                </li>
                                <li><strong>Open
                                        Hours:</strong>{{$info->open_hours?? 'No Information Available'}}
                                </li>
                                <li><strong>Closed
                                        Hours:</strong> {{$info->closed_hours?? 'No Information Available'}}
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="bullets">
                                <li><strong>Reservation
                                        Policy:</strong> {{$info->res_policy ?? 'No Information Available'}}
                                </li>
                                <li><strong>Rooms:</strong> {{$info->rooms ?? 'No Information Available'}}
                                </li>
                                <li><strong>Meal
                                        Plans:</strong> {{$info->meals_plans ?? 'No Information Available'}}
                                </li>
                                <li>
                                    <strong>Miscellaneous</strong> {{$info->miscellaneous ?? 'No Information Available'}}
                                </li>
                            </ul>
                        </div>
                        <br>
                        <div class="col-lg-6">
                            <h3>Phone(s):</h3>
                            <ul class="bullets">
                                @if(count($info->phones)> 0)
                                    @foreach($info->phones as $phone)
                                        <li>(+{{$phone->area_code}}) {{$phone->number}}</li>
                                    @endforeach
                                @else
                                    <li>No Phones Available</li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <h3>Email:</h3>
                            <ul class="bullets">
                                <li>{{$info->email?? "No Email Available"}}</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <h3>Website:</h3>
                            <ul class="bullets">
                                <li><a target="_blank"
                                       href="http://{!!$info->web?? "#0" !!}">{{$info->web ?? "No Website Available"}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <h3>Location & Hours</h3>
                    <div class="row">
                        <div class="col-lg-12">
                            @if($info->latitude !=="0" || $info->longitude !== "0")
                                <div id="map" style="height: 400px;"></div>
                            @else
                                <div>No Map Information available</div>
                            @endif
                            <p style="font-size: 25px; text-align: center;">
                                {{$info->address_string}}
                            </p>
                            <script>
                                function initMap() {
                                    // The location of Uluru
                                    var uluru = {
                                        lat: {{$info->latitude}},
                                        lng: {{$info->longitude}}
                                    };
                                    // The map, centered at Uluru
                                    var map = new google.maps.Map(
                                        document.getElementById('map'), {zoom: 15, center: uluru});
                                    // The marker, positioned at Uluru
                                    var marker = new google.maps.Marker({position: uluru, map: map});
                                }
                            </script>
                            <script
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqEoePvUgef_J7q0_ejxzzt14Nok31cpE&callback=initMap"
                                async defer></script>
                        </div>
                    </div>
                    <!-- /row -->
                </section>
                <!-- /section -->
            </div>
            <section id="reviews">
                <h2>Xpertz Review</h2>

                <div class="reviews-container">
                    <div class="review-box clearfix">
                        <div class="rev-content">
                            <div class="rev-info">

                            </div>
                            <div class="rev-text" style="text-align: justify;">
                                {!!$info->review!!}
                            </div>
                        </div>
                    </div>
                    <!-- /review-box -->
                    <!-- /review-container -->
                </div>
            </section>
            <!-- /section -->
            <hr>
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->
    </div>


@endsection
