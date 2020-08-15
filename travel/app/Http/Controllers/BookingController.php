<?php

namespace App\Http\Controllers;

use App\Destination;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function packages($city = null , $place=null, Request $request)
    {
        $destination = $this->get_destination($city, $place);

        $client_ip = $request->getClientIp();
        $info = geoip($client_ip)->toArray();
        if (array_key_exists('country_name', $info)){
            if ($info['country_name']=='Canada'){
                $city = $info['city'];
                return redirect()->to('https://external.url.com/Vacation?origin='.$city.'&destination='.$destination->name);
            }else{
                return view('packages',  ['destination'=>$destination]);
            }
        }

        return response()->json($info);
    }

    public function get_destination($city, $place){
        $destination = Destination::firstWhere('fodor_id', env('MAIN_DESTINATION_ID'));
        if ($city){
            $destination =  Destination::firstWhere('slug', $city);
        }
        if ($place){
            $destination = Destination::firstWhere('slug', $place);
        }
        return $destination;
    }

}
