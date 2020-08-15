@extends('layouts.app',['message'=>$message ?? '', 'destination'=>$destination ?? '', 'city'=>""])

@section('section', "Vacations, Airfares, Hotels, Resorts, Adventures")

@section('content')

    @component('layouts.components.places.hero_video', ['destination'=>$destination])
    @endcomponent


    @component('layouts.components.places.intro_text',  ['destination'=>$destination])
    @endcomponent
    @component('layouts.components.cities.bd_buttons', ['name' => $destination])
    @endcomponent

    @if($destination->use_t2d)
        @component('layouts.components.places.things', ['destination'=>$destination])
        @endcomponent
    @endif
    @if($destination->use_viator_t2d)
        @component('layouts.components.country.popular_viator', [
            'tours' => $tours,
            'dropdownDestinationValueTour' => $dropdownDestinationValueTour,
            'place' => $destination->slug
        ])
        @endcomponent
    @endif

    @if($destination->use_xperience_more)
        @component('layouts.components.general.more',  ['destination'=>$destination, 'more_do'=>$more_do, 'count_shopping'=>$count_shopping, 'count_sight'=>$count_sight, 'count_nightlife'=>$count_nightlife, 'count_art'=>$count_art])
        @endcomponent
    @endif

    <div class="container container-custom margin_30_95">


        @component('layouts.components.places.hotels', [ 'destination'=>$destination])
        @endcomponent

        @if($destination->use_restaurants)
            @component('layouts.components.places.restaurants', ['destination'=>$destination, 'restaurants'=>$restaurants, 'more_rest'=>$more_rest,'areas_count'=>$areas_count])
            @endcomponent
        @endif

        @component('layouts.components.places.gallery', ['preview'=>$preview ?? '', 'destination'=>$destination])
        @endcomponent

        @component('layouts.components.country.social', ['destination' => $destination])
        @endcomponent

        @component('layouts.components.places.call', ['destination'=>$destination, 'place'=>$destination->slug, 'city'=>$destination->slug])
        @endcomponent
    </div>
@endsection
