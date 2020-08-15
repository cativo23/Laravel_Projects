<div class="container tooltips-section">
    <span class="divider">
        <em></em>
    </span>
    <div class="row">
        <div id="language" class="col-4 col-md-4 tooltip--icon">
            <img src="{{asset('img/Language.png')}}"/>
        </div>
        <div id="currency" class="col-4 col-md-4 tooltip--icon">
            <img src="{{asset('img/Currency.png')}}"/>
        </div>
        <div id="electrical" class="col-4 col-md-4 tooltip--icon">
            <img src="{{ asset('img/Electricity.png') }}"/>
        </div>
    </div>
    <div class="row">
        <div id="transportation" class="col-4 col-md-4 tooltip--icon">
            <img src="{{ asset('img/Transport.png') }}"/>
        </div>
        <div id="calendar" class="col-4 col-md-4 tooltip--icon">
            <img src="{{ asset('img/When to go.png') }}"/>
        </div>
        <div id="airports" class="col-4 col-md-4 tooltip--icon">
            <img src="{{ asset('img/Flights.png') }}"/>
        </div>
    </div>
</div>
<script>
    const languageTooltip = document.getElementById('language');
    languageTooltip.onclick = function(){
        Swal.fire({
            imageUrl: "{{ asset('img/Language.png') }}",
            html: "{{ $cityOverview['language'] }}"
        });
    };

    const currencyTooltip = document.getElementById('currency');
    currencyTooltip.onclick = function(){
      Swal.fire({
          imageUrl: "{{ asset('img/Currency.png') }}",
          html: "{{ $cityOverview['currency'] }}"
      });
    };

    const electricalTooltip = document.getElementById('electrical');
    electricalTooltip.onclick = function(){
        Swal.fire({
            imageUrl: "{{ asset('img/Electricity.png') }}",
            html: "{{ $cityOverview['electrical'] }}"
        });
    };


    const travelTooltip = document.getElementById('transportation');
    travelTooltip.onclick = function(){
        Swal.fire({
            imageUrl: "{{ asset('img/Transport.png') }}",
            html: he.decode("{{ $cityOverview['travel'] }}")
        });
    };

    const calendarTooltip = document.getElementById('calendar');
    calendarTooltip.onclick = function(){
        Swal.fire({
            imageUrl: "{{ asset('img/When to go.png') }}",
            html: he.decode("{{ $cityOverview['whenToGo'] }}")
        });
    };
    const airportTooltip = document.getElementById('airports');
    airportTooltip.onclick = function(){
        Swal.fire({
            imageUrl: "{{ asset('img/Flights.png') }}",
            html: he.decode("{{ $cityOverview['airports'] }}")
        });
    };
</script>
