<section class="add_bottom_45">
    <div class="main_title_3" id="restaurants">
        <span><em></em></span>
        <h2>Where To Eat</h2>
        <p>Popular Places To Dine</p>
    </div>
    <div class="row">
        @foreach( $restaurants['businesses'] as $rest)
            <div class="col-xl-3 col-lg-6 col-md-6">
                <a class="grid_item linkRest1" holder="restaurants/{{$rest['alias']}}" href="">
                    <figure>
                        <div class="score"><strong>{{$rest['rating']}}/5</strong></div>
                        <img src="{{ $rest['image_url'] }}" class="img-fluid" alt="" style="height: 200px!important;">
                        <div class="info">
                            <h3>{{$rest['name']}}</h3>
                        </div>
                    </figure>
                </a>
            </div>
        @endforeach


    <!-- /grid_item -->
    </div>
    <!-- /row -->
    <p class="btn_home_align"><a class="btn_1 rounded addHolder" holder="restaurants" href="restaurants" class="btn_1 rounded">Xperience More
            Restaurants</a></p>
</section>
