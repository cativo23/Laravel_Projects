<div class="container container-custom margin_60_0">
<div class="main_title_2" id="tours">
            <span><em></em></span>
            <h2>Things To See And Do</h2>
        </div>
        <div id="reccomended" class="owl-carousel owl-theme">
            @foreach($things2do as $thing2do)
                <div class="item">
                    <div class="box_grid">
                        <figure>

                            <a href="{{$thing2do->link}}">
                                <img src="{{ str_replace("travel-files.s3.amazonaws.com", "d2wg9vs674sg0m.cloudfront.net",$thing2do->image) }}" class="img-fluid" alt=""
                                     width="800" height="533">
                                <div class="read_more"><span>Xperience more</span></div>
                            </a>
                        </figure>
                        <div class="wrapper">
                            <h3><a href="{{$thing2do->link}}">{{$thing2do->title}}</a></h3>
                            <p><strong>{{$thing2do->place}} </strong>{{ substr($thing2do->intro, 0, 180) . (strlen($thing2do->intro) > 180 ? '...' : '')}}</p>
                        </div>
                    </div>
                </div>
                <!-- /item -->
            @endforeach

        </div>
        <!-- /carousel -->
        <p class="btn_home_align"><a href="{{ url("/adventure") }}" class="btn_1 rounded">Xperience
                More Tours</a></p>
        <hr class="large">
    </div>
    <!-- /container -->
