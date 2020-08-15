<div class="container container-custom">
    <section>
        <div class="main_title_2" id="bd_buttons">
            <span><em></em></span>
            <h2>What Are You Looking For?</h2>
        </div>
    </section>
    @php
        if(!isset($name)){
            $name = "";
        }
    @endphp
    <div class="row">
        <div id="bd-packages-btn" class="col-4 col-lg-2 bd-button">
            <a class="link1" holder="/packages" href="packages/"><img src="{{asset('img/Packages.png')}}" alt="Packages button"/></a>
        </div>
        <div id="bd-flights-btn" class="col-4 col-lg-2 bd-button">
            <a class="link1" holder="/flights" href="flights/"><img src="{{asset('img/Flights.png')}}" alt="Flights button"/></a>
        </div>
        <div id="bd-hotels-btn" class="col-4 col-lg-2 bd-button">
            <a class="link1" holder="/hotels" href="hotels/"><img src="{{asset('img/Hotels.png')}}" alt="Hotels button"/></a>
        </div>
        <div id="bd-cars-btn" class="col-4 col-lg-2 bd-button">
            <a class="link1" holder="/cars" href="cars/"><img src="{{asset('img/cars.png')}}" alt="Cars button"/></a>
        </div>
        <div id="bd-tours-btn" class="col-4 col-lg-2 bd-button">
            <a class="link1" holder="/adventure" href="adventure/"><img src="{{asset('img/Tours.png')}}" alt="Tours button"/></a>
        </div>
        <div id="bd-shuttles-btn" class="col-4 col-lg-2 bd-button">
            <a class="link1" holder="/shuttles" href="shuttles/"><img src="{{asset('img/Shuttles.png')}}" alt="Shuttles button"/></a>
        </div>
    </div>
</div>
<script>

</script>
