@extends('layouts.app',['destination'=>$destination, 'message'=>$message ?? ''])

@section('section', $article->title)

@section('content')

    <section class="hero_in adventure_detail" style="background: url('{{ str_replace("travel-files.s3.amazonaws.com", "d2wg9vs674sg0m.cloudfront.net", $article->image)}}') center center no-repeat !important;  background-size: cover !important; ">
        <div class="wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
            <div class="container">
                <div class="main_info">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="d-flex align-items-center justify-content-between mb-3"><em></em></div>
                            <h1>{{$destination->name}}</h1>
                            <p></p>
                        </div>
                        <div class="col-lg-8">
                            <div class="pl-lg-4">
                                <h1> {{ $article->title}}</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /main_info -->
            </div>
        </div>
    </section>
    <!--/hero_in-->

    <div class="bg_color_1">
        <div class="container margin_60_35 adventure_description">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="pl-lg-12">
                        <p style="text-align: center; font: 400 28px/40px 'Poppins', Helvetica, sans-serif;color: #3b9f9e;">{{$article->quote != "none" ? $article->quote : "" }}</p>
                        {!! $article->text !!}
                    </div>
                </div>
            </div>
            <!-- /row -->


            @for($i = 0; $i<count($article->sections); $i++)
                <div class="row mb-5">

                    @if($article->sections[$i]->title!=="")
                    <div class="col-lg-4 fixed_title">
                            <h2>{{ ($i+1).") ".$article->sections[$i]->title}} </h2>
                    </div>
                        <div class="col-lg-8">
                            @else

                                <div class="col-lg-12">
                    @endif
                        <div class="pl-lg-4">
                            <figure><img src="{{str_replace("travel-files.s3.amazonaws.com", "d2wg9vs674sg0m.cloudfront.net", $article->sections[$i]->image)}}" class="img-fluid" alt=""></figure>
                            @if($article->sections[$i]->caption)
                                <p style="text-align: center;"><strong>{{$article->sections[$i]->caption}}</strong></p>
                            @endif
                            <p style="text-align: justify;font-size: larger;">{!!$article->sections[$i]->text!!}</p>
                        </div>
                    </div>
                </div>
                @endfor
            <!-- /row --
            <h4>Location</h4>
            <div id="map" class="map map_single mb-5"></div>
            !-- End Map -->
            <!-- /row -->

        </div>
        <!-- /container -->
    </div>
    <!-- /bg_color_1 -->

    @component('layouts.components.country.social', ['place' => $place, 'city'=>$city])
    @endcomponent

    @component('layouts.components.country.call', ['site' => $destination])
    @endcomponent
@endsection


