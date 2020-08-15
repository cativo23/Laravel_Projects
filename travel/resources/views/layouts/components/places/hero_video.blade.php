<section class="slider">
    <div id="slider" class="flexslider">
        <ul class="slides">
            <li>
                <img src="{{ asset('img/video_fix.png') }}" alt="" class="header-video--media"
                     data-video-src="view/video/hero" data-teaser-source="view/video/hero" data-provider=""
                     data-video-width="1920" data-video-height="960" autoplay preload>
                <video
                    autoplay
                    loop="loop"
                    muted
                    id="teaser-video"
                    class="teaser-video"
                    playsinline=""
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
                </div>
            </li>
            @foreach($destination->children() as $child)
                <li>
                    <img src="{{ str_replace("travel-files.s3.amazonaws.com", "d2wg9vs674sg0m.cloudfront.net", $child->image_header) }}" alt="" >
                    <div class="meta">
                        <h3>{{$child->name}} Xpertz</h3>
                        <a href="{{$child->link_external}}" class="btn_1">Xperience more</a>
                    </div>
                </li>
            @endforeach
        </ul>
        <div id="icon_drag_mobile"></div>
    </div>
    <div id="carousel_slider_wp">
        <div id="carousel_slider" class="flexslider">
            <ul class="slides">
                <li></li>
                @foreach($destination->children() as $child)
                    <li class="@if(!$child->is_available) no-action @endif">
                        <img src="{{ str_replace("travel-files.s3.amazonaws.com", "d2wg9vs674sg0m.cloudfront.net", $child->image_header_thumbnail) }}" alt="">
                        <div class="caption">
                            <h3>{{$child->name}}<span>Xpertz @if(!$child->is_available) COMING SOON @endif</span></h3>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
