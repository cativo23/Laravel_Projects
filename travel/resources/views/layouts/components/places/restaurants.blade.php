<section class="add_bottom_45">
    <div class="main_title_3" id="restaurants">
        <span><em></em></span>
        <h2>Popular Restaurants</h2>
        <p>Book the top restaurants ahead of your vacation and avoid disappointment</p>
    </div>
    <div class="row">
        @foreach( $restaurants['businesses'] as $rest)
            <div class="col-xl-3 col-lg-6 col-md-6">
                <a class="grid_item addHolder" holder="restaurants/{{$rest['alias']}}" href="">
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
    </div>

@if($destination->use_xperience_more)
    @component('layouts.components.general.more_restaurants', [
    'more_rest'=>$more_rest,
    'areas_count'=>$areas_count,
    ])
    @endcomponent
@endif

<!-- /row -->
    <p class="btn_home_align"><a class="btn_1 rounded addHolder" holder="restaurants" href="" >Xperience More
            Restaurants</a></p>
</section>
<!-- /section -->
