@extends('layouts.app', ['place'=>$place])

@section('section', $info['name'])

@section('content')
    <section class="hero_in restaurants_detail"
             style="background: url('{{$info['image_url']}}')!important; background-repeat: no-repeat!important; background-size: cover!important;">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>{{$info['name']}}</h1>
            </div>
            <span class="magnific-gallery">
					<a href="{{$info['photos'][0]}}" class="btn_photos" title="Photo title" data-effect="mfp-zoom-in">View photos</a>

                @for ($i = 1; $i < count($info['photos']); $i++)
                    <a href="{{$info['photos'][$i]}}" title="Photo title" data-effect="mfp-zoom-in"></a>
                @endfor
				</span>
        </div>
    </section>
    <!--/hero_in-->
    <div class="bg_color_1">
        <nav class="secondary_nav sticky_horizontal">
            <div class="container">
                <ul class="clearfix">
                    <li><a href="#description" class="active">Description</a></li>
                    <li><a href="#reviews" class="active">Reviews</a></li>
                    <li><a href="#" class="active">Empty</a></li>
                </ul>
            </div>
        </nav>
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-12">
                    <section id="description">
                        <h2>Description</h2>
                        <!--<h3>Amenities</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="bullets">
                                    <li>Amenitie 1</li>
                                    <li>Amenitie 1</li>
                                    <li>Amenitie 1</li>
                                    <li>Amenitie 1</li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="bullets">
                                    <li>Amenitie 2</li>
                                    <li>Amenitie 1</li>
                                    <li>Amenitie 1</li>
                                    <li>Amenitie 1</li>
                                </ul>
                            </div>
                        </div>-->
                        <h3>Location & Hours</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div id="map" style="height: 400px;"></div>
                                <p>
                                    @foreach($info['location']['display_address'] as $address)
                                        {{ $address }}<br/>
                                    @endforeach
                                </p>
                                <script>
                                    function initMap() {
                                        // The location of Uluru
                                        var uluru = {
                                            lat: {{$info['coordinates']['latitude']}},
                                            lng: {{$info['coordinates']['longitude']}} };
                                        // The map, centered at Uluru
                                        var map = new google.maps.Map(
                                            document.getElementById('map'), {zoom: 18, center: uluru});
                                        // The marker, positioned at Uluru
                                        var marker = new google.maps.Marker({position: uluru, map: map});
                                    }
                                </script>
                                <script
                                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqEoePvUgef_J7q0_ejxzzt14Nok31cpE&callback=initMap"
                                    async defer></script>
                            </div>

                            <div class="col-lg-6">
                                @if(array_key_exists("hours", $info))
                                    <table>
                                        <tbody>
                                        <tr>
                                            <th scope="col"><p>
                                                    Mon</p></th>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <p>
                                                            @foreach($info['hours'][0]['open'] as $hour)
                                                                @if($hour['day']=='0')
                                                                    {{ date("h:i a",strtotime($hour['start']))}} - {{ date("h:i a",strtotime($hour['end']))}}
                                                                @endif
                                                            @endforeach
                                                        </p></li>
                                                </ul>
                                            </td>
                                            <td>
                                                @if($info['hours'][0]['is_open_now'])
                                                    @if(date('D', strtotime(today())) === 'Mon')
                                                        IS OPEN
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col"><p>
                                                    Tue</p></th>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <p>
                                                            @foreach($info['hours'][0]['open'] as $hour)
                                                                @if($hour['day']=='1')
                                                                    {{ date("h:i a",strtotime($hour['start']))}} - {{ date("h:i a",strtotime($hour['end']))}}
                                                                @endif
                                                            @endforeach
                                                        </p></li>
                                                </ul>
                                            </td>
                                            <td>
                                                @if($info['hours'][0]['is_open_now'])
                                                    @if(date('D', strtotime(today())) === 'Tues')
                                                        IS OPEN
                                                    @endif
                                                @endif
                                            </td>
                                        <tr>
                                            <th scope="col"><p>
                                                    Wed</p></th>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <p>
                                                            @foreach($info['hours'][0]['open'] as $hour)
                                                                @if($hour['day']=='2')
                                                                    {{ date("h:i a",strtotime($hour['start']))}} - {{ date("h:i a",strtotime($hour['end']))}}
                                                                @endif
                                                            @endforeach
                                                        </p></li>
                                                </ul>
                                            </td>
                                            <td>
                                                @if($info['hours'][0]['is_open_now'])
                                                    @if(date('D', strtotime(today())) === 'Wed')
                                                        <p><strong style="color: green;">Currently Open</strong></p>
                                                    @endif
                                                @endif
                                            </td>
                                        <tr>
                                            <th scope="col"><p>
                                                    Thu</p></th>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <p>
                                                            @foreach($info['hours'][0]['open'] as $hour)
                                                                @if($hour['day']=='3')
                                                                    {{ date("h:i a",strtotime($hour['start']))}} - {{ date("h:i a",strtotime($hour['end']))}}
                                                                @endif
                                                            @endforeach
                                                        </p></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col"><p>
                                                    Fri</p></th>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <p>
                                                            @foreach($info['hours'][0]['open'] as $hour)
                                                                @if($hour['day']=='4')
                                                                    {{ date("h:i a",strtotime($hour['start']))}} - {{ date("h:i a",strtotime($hour['end']))}}
                                                                @endif
                                                            @endforeach
                                                        </p></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col"><p>
                                                    Sat</p></th>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <p>
                                                            @foreach($info['hours'][0]['open'] as $hour)
                                                                @if($hour['day']=='5')
                                                                    {{ date("h:i a",strtotime($hour['start']))}} - {{ date("h:i a",strtotime($hour['end']))}}
                                                                @endif
                                                            @endforeach
                                                        </p></li>
                                                </ul>
                                            </td>
                                        <tr>
                                            <th scope="col"><p>
                                                    Sun</p></th>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <p>
                                                            @foreach($info['hours'][0]['open'] as $hour)
                                                                @if($hour['day']=='6')
                                                                    {{ date("h:i a",strtotime($hour['start']))}} - {{ date("h:i a",strtotime($hour['end']))}}
                                                                @endif
                                                            @endforeach
                                                        </p></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                @else

                                    There are no opening hours available
                                @endif
                            </div>
                        </div>
                        <!-- /row -->
                        <hr>
                    </section>
                    <!-- /section -->

                    <section id="reviews">
                        <h2>Reviews</h2>
                        <div class="reviews-container">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div id="review_summary">
                                        <strong>{{$info['rating']}}</strong>
                                        <small>Based on {{$info['review_count']}} reviews</small>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 90%"
                                                     aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 95%"
                                                     aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 60%"
                                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 20%"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 0"
                                                     aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                </div>
                            </div>
                            <!-- /row -->
                        </div>

                        <hr>

                        <div class="reviews-container">

                            @foreach($reviews as $rev)
                                <div class="review-box clearfix">
                                    <figure class="rev-thumb"><img src="{{$rev['user']['image_url']}}" alt="">
                                    </figure>
                                    <div class="rev-content">
                                        <div class="rating">
                                            @switch($rev['rating'])
                                                @case("1")
                                                <i class="icon_star voted"></i><i class="icon_star"></i><i
                                                    class="icon_star"></i><i class="icon_star"></i><i
                                                    class="icon_star"></i>
                                                @break
                                                @case("2")
                                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                    class="icon_star"></i><i class="icon_star"></i><i
                                                    class="icon_star"></i>
                                                @break
                                                @case("3")
                                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                    class="icon_star voted"></i><i class="icon_star"></i><i
                                                    class="icon_star"></i>
                                                @break
                                                @case("4")
                                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                    class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                    class="icon_star"></i>
                                                @break
                                                @case("5")
                                                <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                    class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                    class="icon_star voted"></i>
                                                @break
                                                @default
                                                <i class="icon_star"></i><i class="icon_star"></i><i
                                                    class="icon_star"></i><i class="icon_star"></i><i
                                                    class="icon_star"></i>
                                                @break
                                            @endswitch
                                        </div>
                                        <div class="rev-info">
                                            {{$rev['user']['name']}}
                                            – {{ date('M d/y', strtotime($rev['time_created'])) }}:
                                        </div>
                                        <div class="rev-text">
                                            <p>
                                                {{$rev['text']}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /review-box -->
                            @endforeach
                        </div>
                        <!-- /review-container -->
                    </section>
                    <!-- /section -->
                    <hr>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /container -->
@endsection
