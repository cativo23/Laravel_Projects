<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Destination;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Log;

class GalleryController1 extends Controller
{
    public function index(Request $request)
    {
        $place = $request->place;
        $city = $request->citi;

        if ($city != ''){
            $destination = Destination::firstWhere('slug', $city);
        }elseif ($place !=''){
            $destination = Destination::firstWhere('slug', $place);
        }else{
            $destination = Destination::firstWhere('fodor_id', env('MAIN_DESTINATION_ID'));
        }


        $gallery_view = "gallery";

        if ($place)
            $gallery_view = "layouts.components.places.place_gallery";

        if ($city)
            $gallery_view = "layouts.components.cities.city_gallery";


        return view($gallery_view,
            compact(
                 'place', 'city' , 'destination'
            ));
    }
}
