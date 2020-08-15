<?php

namespace App\Http\Controllers;

use App\Destination;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InformationController extends Controller
{
    /**
     * @param null $city
     * @param null $place
     * @return Application|Factory|View
     */
    public function about($city = null , $place=null){
        $destination = $this->get_destination($city, $place);
        return view('about', ['destination'=>$destination]);
    }

    /**
     * @param null $city
     * @param null $place
     * @return Application|Factory|View
     */
    public function privacy($city = null , $place=null){
        $destination = $this->get_destination($city, $place);
        return view('privacy',  ['destination'=>$destination]);
    }

    public function terms($city = null , $place=null){
        $destination = $this->get_destination($city, $place);
        return view('terms',  ['destination'=>$destination]);
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
