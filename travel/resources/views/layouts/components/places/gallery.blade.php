<div class="container margin_60_35">
    <div class="main_title_2">
        <span><em></em></span>
        <h2>Photo Gallery</h2>
    </div>
    <div class="grid">
        <ul class="magnific-gallery">
            @if($preview)
                @foreach($preview as $image)
                    <li>
                        <figure>
                            <img src="{{ str_replace("travel-files.s3.amazonaws.com", "d2wg9vs674sg0m.cloudfront.net", $image->image)}}" alt="">
                            <figcaption>
                                <div class="caption-content">
                                    <a href="{{ str_replace("travel-files.s3.amazonaws.com", "d2wg9vs674sg0m.cloudfront.net", $image->image)}}"
                                       title="{{$image->title}}" data-effect="mfp-zoom-in">
                                        <i class="pe-7s-albums"></i>
                                        <p>{{$image->title}}</p>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <!-- /grid gallery -->
    <p class="btn_home_align"><a class="btn_1 rounded addHolder" holder="gallery" href="">Xperience
            More Media</a></p>
</div>
<!-- /container -->
