<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IPController extends Controller
{
    public function test(Request $request){
        $client_ip = $request->getClientIp();
        $info = geoip($client_ip)->toArray();
        if (array_key_exists('country_name', $info)){
            if ($info['country_name']=='Canada'){
                $city = $info['city'];
                //redirect
            }else{
                //normal
            }
        }
        return response()->json($info->toArray());
    }



}
