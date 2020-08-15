@extends('layouts.app',['message'=>$message ?? '', 'destination'=> $destination])
@section('section', "Book Hotels")
@section('content')
    @component('layouts.components.general.hero_video_general', ['destination'=> $destination])
    @endcomponent
    <div id="main-container" class="container container-custom margin_30_95">
        @switch($destination->slug)
            @case("florida")
            @php
                $cityName = "Florida area";
            @endphp
            @break
            @case("fort-lauderdale")
            @php
                $cityName = "Fort Lauderdale area";
            @endphp
            @break
            @case("miami")
            @php
                $cityName = "Miami Area";
            @endphp
            @break
            @case("orlando")
            @php
                $cityName = "Orlando area";
            @endphp
            @break

            @case("hawaii")
            @php
                $cityName = "Honolulu";
            @endphp
            @break

            @case("chicago")
            @php
                $cityName = "Chicago";
            @endphp
            @break

            @case("boston")
            @php
                $cityName = "Boston Massachusetts";
            @endphp
            @break

            @case("new-york-city")
            @php
                $cityName = "New York City";
            @endphp
            @break

            @case("washington-dc")
            @php
                $cityName = "Washington D.C. area";
            @endphp
            @break

            @case("california")
            @php
                $cityName= "Central Interior California"
            @endphp
            @break
            @case("los-angeles")
            @php
                $cityName = "Los Angeles area";
            @endphp
            @break

            @case("las-vegas")
            @php
                $cityName = "Las Vegas Area";
            @endphp
            @break

        @endswitch
    @component('layouts.components.bestdayform', ['tab'=>'viewHotels', 'name' => $cityName ?? ''])
    @endcomponent
    </div>
@endsection
