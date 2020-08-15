<?php

namespace App\Http\Controllers;

use App\Article;
use App\Destination;
use App\PointOfInterest;
use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;


class MoreController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sights($place = null, $city = null)
    {

        $class_id = 13;

        list($destination, $areas, $prices, $keywords, $info)= $this->get_info($city, $place, $class_id);

        return view("explore_more_items_list", ["place" => $place, "city" => $city, "info" => $info, "keywords" => $keywords, "areas"=>$areas, "type"=>"Nightlife", "destination"=>$destination]);
    }

    public function sight_detail(Request $request)
    {

        $place = $request->place;
        $city = $request->city;

        if ($city){
            $des = $city;
        }else{
            $des = $place;
        }

        $destination = Destination::firstWhere('slug', $des);

        $info = PointOfInterest::firstWhere('fodor_id', $request->code);

        return view("explore_more_item_detail", ['info' => $info, 'destination'=>$destination]);
    }

    public function shopping($place = null, $city = null)
    {

        $class_id = 12;

        list($destination, $areas, $prices, $keywords, $info)= $this->get_info($city, $place, $class_id);

        return view("explore_more_items_list", ["place" => $place, "city" => $city, "info" => $info, "keywords" => $keywords, "areas"=>$areas, "type"=>"Nightlife", "destination"=>$destination]);
    }

    public function shopping_detail(Request $request)
    {

        $place = $request->place;
        $city = $request->city;

        if ($city){
            $des = $city;
        }else{
            $des = $place;
        }

        $destination = Destination::firstWhere('slug', $des);

        $info = PointOfInterest::firstWhere('fodor_id', $request->code);

        return view("explore_more_item_detail", ['info' => $info, 'destination'=>$destination]);
    }

    public function nightlife(Request $request)
    {
        $place = $request->place;
        $city = $request->city;

        $class_id = 10;

        list($destination, $areas, $prices, $keywords, $info)= $this->get_info($city, $place, $class_id);

        return view("explore_more_items_list", ["place" => $place, "city" => $city, "info" => $info, "keywords" => $keywords, "areas"=>$areas, "type"=>"Nightlife", "destination"=>$destination]);
    }

    public function nightlife_detail(Request $request)
    {

        $place = $request->place;
        $city = $request->city;

        if ($city){
            $des = $city;
        }else{
            $des = $place;
        }

        $destination = Destination::firstWhere('slug', $des);

        $info = PointOfInterest::firstWhere('fodor_id', $request->code);

        return view("explore_more_item_detail", ['info' => $info, 'destination'=>$destination]);
    }

    public function art(Request $request)
    {
        $place = $request->place;
        $city = $request->city;

        $class_id = 6;

        list($destination, $areas, $keywords, $info)= $this->get_info($city, $place, $class_id);

        return view("explore_more_items_list", ["place" => $place, "city" => $city, "info" => $info, "keywords" => $keywords, "areas"=>$areas, "type"=>"Arts", "destination"=>$destination]);
    }

    public function art_detail(Request $request)
    {
        $place = $request->place;
        $city = $request->city;

        if ($city){
            $des = $city;
        }else{
            $des = $place;
        }

        $destination = Destination::firstWhere('slug', $des);

        $info = PointOfInterest::firstWhere('fodor_id', $request->code);

        return view("explore_more_item_detail", ['info' => $info, 'destination'=>$destination]);
    }

    public function get_info($city, $place, $class_id){

        if ($city){
            $des = $city;
        }else{
            if ($place){
                $des = $place;
            }else{
                $des = env('MAIN_DESTINATION_SLUG');
            }
        }

        $destination = Destination::firstWhere('slug', $des);

        $keywords = $this->get_keywords($class_id, $destination->fodor_id);

        foreach ($keywords as $keyword){
            if ($keyword->name=='$' || $keyword->name=='$$' || $keyword->name=='$$$' || $keyword->name=='$$$$'){
                array_push($prices, $keyword);
                unset($keyword);
            }
        }

        $areas = $this->get_areas($class_id, $destination->fodor_id);

        $info  = $this->get_pois_db($destination->fodor_id, 0, 20, $class_id);

        return array($destination, $areas, $keywords, $info);
    }

    public function get_pois_db($fodor_id, $skip, $take, $class){

    $first_like = "%".$fodor_id."|%";

    $rest_db =  DB::table('point_class')
        ->selectRaw('point_of_interests.id, destinations.name, point_of_interests.name AS res')
        ->join('point_of_interests', 'point_class.point_of_interest_id', '=', 'point_of_interests.id')
        ->join('class_fodors', 'point_class.class_fodor_id','=', 'class_fodors.id')
        ->join('point_dest', 'point_dest.point_of_interest_id', '=', 'point_of_interests.id')
        ->join('destinations', 'point_dest.destination_id', '=', 'destinations.id')
        ->where('class_fodors.fodor_id', '=', $class)
        ->where('destinations.id_path', 'LIKE', $first_like);


    if ($take>=0 && $skip>=0){
        $rest_db = $rest_db->skip($skip)->take($take);
    }

    $rest_db = $rest_db->pluck('id');


    return PointOfInterest::whereIn('id', $rest_db->toArray())->get();
}

    private function get_keywords($class_id, $fodor_id)
    {
        $first_like = "%".$fodor_id."|%";

        return DB::table('point_keyword')
            ->selectRaw('COUNT(keywords.name) AS count, keywords.name AS name')
            ->join('keywords', 'point_keyword.keyword_id',  '=', 'keywords.id')
            ->join('point_of_interests', 'point_keyword.point_of_interest_id', '=',  'point_of_interests.id')
            ->join('point_class', 'point_class.point_of_interest_id', '=', 'point_of_interests.id')
            ->join('class_fodors', 'point_class.class_fodor_id' , '=', 'class_fodors.id')
            ->join('point_dest', 'point_dest.point_of_interest_id',  '=', 'point_of_interests.id')
            ->join('destinations', 'point_dest.destination_id',  '=', 'destinations.id')
            ->where('class_fodors.fodor_id', '=', $class_id)
            ->where('destinations.id_path', 'LIKE', $first_like)
            ->groupBy('keywords.name')->get();
    }

    private function get_areas($class_id, $fodor_id){
        $first_like = "%".$fodor_id."|%";
        return DB::table('point_class')
            ->selectRaw('COUNT(destinations.name) AS count, destinations.name AS name')
            ->join('class_fodors', 'point_class.class_fodor_id','=', 'class_fodors.id')
            ->join('point_of_interests', 'point_class.point_of_interest_id', '=', 'point_of_interests.id')
            ->join('point_dest', 'point_dest.point_of_interest_id', '=', 'point_of_interests.id')
            ->join('destinations', 'point_dest.destination_id', '=', 'destinations.id')
            ->where('class_fodors.id', '=', $class_id)
            ->where('destinations.id_path', 'LIKE', $first_like)
            ->groupBy('destinations.name')->get();
    }

    public function article(Request $request){
        $place = $request->place;
        $city = $request->city;
        $article_id = $request->id;

        if ($city){
            $des = $city;
        }else{
            $des = $place;
        }

        $destination = Destination::firstWhere('slug', $des);

        $article = Article::firstWhere('slug', $article_id);

        return view("article", ["destination"=>$destination, "article"=>$article ,"place" => $place, "city" => $city]);
    }
}


