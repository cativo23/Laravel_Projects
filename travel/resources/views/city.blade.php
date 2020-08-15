@extends('layouts.app',['message'=>$message ?? '', 'destination'=>$destination ?? ''])

@section('section', "Vacations, Airfares, Hotels, Resorts, Adventures")

@section('content')
    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('js/he.js')}}"></script>
    @component('layouts.components.cities.head_slider', ['city'=>$citi, 'place'=>$place??'none'])
    @endcomponent

    @component('layouts.components.cities.overview_text', ['city'=>$citi, 'citi'=>$city])
    @endcomponent

    @component('layouts.components.cities.bd_buttons', ['name' => $citi])
    @endcomponent

    @if(
        $citi !== 'fort-lauderdale'
    )
        @component('layouts.components.cities.popular', [
            'xml_P1'=> $xml_P1, 'xml_P2'=>$xml_P2, 'xml_P3'=> $xml_P3, 'xml_P4'=>$xml_P4, 'xml_P5'=> $xml_P5, 'xml_P6'=>$xml_P6,
            'dropdownDestinationValueTour'=>$dropdownDestinationValueTour
        ])
        @endcomponent
    @endif

    {{--
    @component('layouts.components.general.more',['travel_tips'=>$travel_tips])
    @endcomponent --}}

    <div class="container container-custom margin_30_95" style="padding-bottom: 0px;">

        @component('layouts.components.cities.stay', [
            'xml_P7'=> $xml_P7,'xml_P8'=> $xml_P8, 'xml_P9'=>$xml_P9, 'xml_P10'=> $xml_P10,
            'dropdownDestinationValueHotel'=>$dropdownDestinationValueHotel
         ])
        @endcomponent


        @component('layouts.components.cities.eat', ['restaurants'=> $restaurants, 'city'=> $citi, 'place' => $place])
        @endcomponent
    </div>
    <!-- /container -->
    @component('layouts.components.cities.gallery', ['city'=>$citi, 'place' => $place])
    @endcomponent

    @component('layouts.components.cities.social', ['city'=> $citi])
    @endcomponent

    @component('layouts.components.cities.tooltips', ['cityOverview' => $cityOverview])
    @endcomponent

    @component('layouts.components.cities.call', ['citi'=> $city])
    @endcomponent

@endsection
