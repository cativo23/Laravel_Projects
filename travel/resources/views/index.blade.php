@extends('layouts.app',['message'=>$message ?? '', "place"=>"", "city"=>""])

@section('section', 'Vacations, Airfares, Hotels, Resorts, Adventures ')

@section('content')

    @component('layouts.components.country.hero_video', ['destinations'=>$destination->children(), 'destination'=>$destination])
    @endcomponent

    @component('layouts.components.country.intro_text', ['site'=>$destination])
    @endcomponent

    @if($destination->use_bd_btn)
        @component('layouts.components.cities.bd_buttons')
        @endcomponent
    @endif

    @if($destination->use_t2d)
        @component('layouts.components.country.things', ['things2do'=> $destination->things2Do])
        @endcomponent
    @endif

    {@if($destination->use_xperience_more)
        @component('layouts.components.general.more', ['destination'=>$destination, 'more_do'=>$more_do, 'count_shopping'=>$count_shopping, 'count_sight'=>$count_sight, 'count_nightlife'=>$count_nightlife, 'count_art'=>$count_art])
        @endcomponent
    @endif

    <div class="container container-custom margin_30_95">

        @if($destination->use_hotels)
            @component('layouts.components.country.hotels', ['hotels'=> $destination->hotels])
            @endcomponent
        @endif



            @if($destination->use_restaurants)
                @component('layouts.components.country.restaurants', ['destination'=>$destination, 'restaurants'=>$restaurants, 'more_rest'=>$more_rest,'areas_count'=>$areas_count])
                @endcomponent
            @endif

        @if($destination->use_gallery)
            @component('layouts.components.country.gallery', ['images'=>$gallery_preview])
            @endcomponent
        @endif

        @component('layouts.components.country.social')
        @endcomponent

        @component('layouts.components.country.call',['place'=>'', 'site'=>$destination])
        @endcomponent
    </div>
@endsection
