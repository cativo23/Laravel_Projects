@extends('layouts.app',['message'=>$message ?? '', 'destination'=> $destination])
@section('section', "Rent Cars")
@section('content')
    @component('layouts.components.general.hero_video_general', ['destination'=> $destination])
    @endcomponent
    <div id="main-container" class="container container-custom margin_30_95">
        @component('layouts.components.bestdayform', ['tab'=>'viewCars', 'name' => $destination->slug])
        @endcomponent
    </div>
@endsection
