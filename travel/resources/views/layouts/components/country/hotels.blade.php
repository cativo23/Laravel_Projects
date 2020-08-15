<section class="add_bottom_45">
    <div class="main_title_3" id="hotels">
        <span><em></em></span>
        <h2>Popular Hotels And Accommodations</h2>
        <p>Explore the best places to stay in USA.</p>
    </div>
    <div class="row">
        @foreach($hotels as $hotel)
            <div class="col-xl-3 col-lg-6 col-md-6">
                <a href="{{$hotel->link}}" class="grid_item">
                    <figure>
                        <img src="{{ str_replace("travel-files.s3.amazonaws.com", "d2wg9vs674sg0m.cloudfront.net",$hotel->image)}}" class="img-fluid" alt="">
                        <div class="info">
                            <h3>{{$hotel->name}}</h3>
                        </div>
                    </figure>
                </a>
            </div>
            <!-- /grid_item -->
        @endforeach
    </div>
    <!-- /row -->
    <p class="btn_home_align"><a href="https://reservations.travel.com/Hotels/List?af=AF-TXRM&ot=0&di=0&ln=ing&cu=US&alf=0&GAProd=HT" class="btn_1 rounded">Xperience
            More Hotels</a></p>
</section>
<!-- /section -->
<style>
    .img-fluid{
        height: 200px!important;
    }
</style>
