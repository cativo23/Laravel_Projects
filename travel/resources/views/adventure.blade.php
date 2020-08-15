@extends('layouts.app',['message'=>$message ?? '', 'destination'=> $destination])
@section('section', "Book Tours")
@section('content')


    @component('layouts.components.general.hero_video_general', ['destination'=> $destination])
    @endcomponent
    <div id="main-container" class="container container-custom margin_30_95">
        @switch($destination->slug)

            @case("fort-lauderdale")
            @php
                $cityCode = "13477";
            @endphp
            @break

            @case("miami")
            @php
                $cityCode = "16278";
            @endphp
            @break

            @case("orlando")
            @php
                $cityCode = "17408";
            @endphp
            @break

            @case("hawaii")
            @php
                $cityCode = "14500";
            @endphp
            @break

            @case("chicago")
            @php
                $cityCode = "11875";
            @endphp
            @break

            @case("boston")
            @php
                $cityCode = "11059";
            @endphp
            @break

            @case("new-york-city")
            @php
                $cityCode = "16929";
            @endphp
            @break

            @case("washington-dc")
            @php
                $cityCode = "20426";
            @endphp
            @break

            @case("california")
            @php
                $cityCode = "15738";
            @endphp
            @break
            @case("los-angeles")
            @php
                $cityCode = "15738";
            @endphp
            @break


            @case("las-vegas")
            @php
                $cityCode = "15394";
            @endphp
            @break
        @endswitch

        @component('layouts.components.bestdayform', ['tab'=>'viewTours', 'name' => $cityCode ?? ''])
        @endcomponent

    </div>
@endsection
