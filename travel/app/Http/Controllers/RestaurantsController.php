<?php

namespace App\Http\Controllers;

use App\PointOfInterest;
use Illuminate\Support\Facades\DB;
use App\Destination;
use GuzzleHttp\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use Log;

class RestaurantsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var Client
     */
    protected $yelpClient = '';

    /**
     * @var string
     */
    protected $yelpApiKey = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->yelpClient = new Client(['base_uri' => env('YELP_API_URL')]);
        $this->yelpApiKey = env('YELP_API_KEY');
    }

    /**
     * Gets all Restaurants on Main Site
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        //We get some restaurants of some USA cities
        //TODO: Change to get them from database Using New Model Restaurant, Since it will have all yelp info too
        $restaurants = json_decode($this->yelpClient->request('GET', 'businesses/search?location=florida&sort_by=rating&categories=restaurants&limit=5', ['headers' => ['Authorization' => 'Bearer ' . $this->yelpApiKey]])->getBody(), true)['businesses'];
        $restaurants = array_merge($restaurants, json_decode($this->yelpClient->request('GET', 'businesses/search?location=california&sort_by=rating&categories=restaurants&limit=5', ['headers' => ['Authorization' => 'Bearer ' . $this->yelpApiKey]])->getBody(), true)['businesses']);
        $restaurants = array_merge($restaurants, json_decode($this->yelpClient->request('GET', 'businesses/search?location=chicago&sort_by=rating&categories=restaurants&limit=5', ['headers' => ['Authorization' => 'Bearer ' . $this->yelpApiKey]])->getBody(), true)['businesses']);
        $restaurants = array_merge($restaurants, json_decode($this->yelpClient->request('GET', 'businesses/search?location=boston&sort_by=rating&categories=restaurants&limit=5', ['headers' => ['Authorization' => 'Bearer ' . $this->yelpApiKey]])->getBody(), true)['businesses']);
        $restaurants = array_merge($restaurants, json_decode($this->yelpClient->request('GET', 'businesses/search?location=New York&sort_by=rating&categories=restaurants&limit=5', ['headers' => ['Authorization' => 'Bearer ' . $this->yelpApiKey]])->getBody(), true)['businesses']);
        $destination = Destination::firstWhere('fodor_id', env('MAIN_DESTINATION_ID'));
        //We get the respectives reviews
        $reviews = (array)null;
        foreach ($restaurants as $restaurant) {
            $id = urlencode($restaurant['alias']);
            $url = 'businesses/' . $id . '/reviews';
            $res = json_decode($this->yelpClient->request('GET', $url, ['headers' => ['Authorization' => 'Bearer ' . $this->yelpApiKey]])->getBody(), true)['reviews'];
            $review = array(
                array(
                    "id_rest" => $restaurant['id'],
                    "rev" => $res
                )
            );
            $reviews = array_merge($reviews, $review);
        }

        return view('restaurants',
            compact(
                'restaurants', 'reviews', 'destination'
            ));
    }

    public function show_rest(Request $request)
    {
        $place = $request->place;
        $city = $request->city;

        $des='';

        if ($city){
            $des = $city;
        }elseif($place) {
            $des = $place;
        }else{
            $des =  env('MAIN_DESTINATION_SLUG');
        }

        $restaurant = $request->restaurant;
        Log::info($des);
        $destination = Destination::firstWhere('slug',$des);
        $info = json_decode($this->yelpClient->request('GET', 'businesses/' . $restaurant, ['headers' => ['Authorization' => 'Bearer ' . $this->yelpApiKey]])->getBody(), true);
        $reviews = json_decode($this->yelpClient->request('GET', 'businesses/' . $restaurant . '/reviews', ['headers' => ['Authorization' => 'Bearer ' . $this->yelpApiKey]])->getBody(), true)['reviews'];
        return view('restaurant_info', ['info' => $info, 'reviews' => $reviews, 'destination' => $destination]);
    }

    public function get_res_db($des, $skip, $areas){

        $first_like = "%".$des->fodor_id."|%";

        if (count($areas)>0){
            if($areas[0] == ''){
                $areas = [];
            }
        }

        $rest_db =  DB::table('point_class')
            ->selectRaw('point_of_interests.id, destinations.name, point_of_interests.name AS res')
            ->join('point_of_interests', 'point_class.point_of_interest_id', '=', 'point_of_interests.id')
            ->join('class_fodors', 'point_class.class_fodor_id','=', 'class_fodors.id')
            ->join('point_dest', 'point_dest.point_of_interest_id', '=', 'point_of_interests.id')
            ->join('destinations', 'point_dest.destination_id', '=', 'destinations.id')
            ->where('class_fodors.id', '=', 2)
            ->where('destinations.id_path', 'LIKE', $first_like);

        if (count($areas)>0){
            $rest_db= $rest_db->whereIn('destinations.slug', $areas);
        }

        $rest_db = $rest_db->skip($skip)->take(10)->get();


        $id = [];

        foreach ($rest_db as $res){
            array_push($id, $res->id);
        }

        return PointOfInterest::whereIn('id', $id)->get();
    }

    public function get(Request $request)
    {
        $place = $request->place;
        $city = $request->citi;

        if ($city){
        $des = $city;
        }else{
            $des = $place;
        }

        $area1 = $request->area;

        $area = explode(',',$area1);

        $destination = Destination::firstWhere('slug', $des);

        $first_like = "%".$destination->fodor_id."|%";

        $restaurants_fodor = $this->get_res_db($destination, 0, $area);

        $keywords = DB::table('point_keyword')
            ->selectRaw('COUNT(keywords.name) AS count, keywords.name AS name')
            ->join('keywords', 'point_keyword.keyword_id',  '=', 'keywords.id')
            ->join('point_of_interests', 'point_keyword.point_of_interest_id', '=',  'point_of_interests.id')
            ->join('point_class', 'point_class.point_of_interest_id', '=', 'point_of_interests.id')
            ->join('class_fodors', 'point_class.class_fodor_id' , '=', 'class_fodors.id')
            ->join('point_dest', 'point_dest.point_of_interest_id',  '=', 'point_of_interests.id')
            ->join('destinations', 'point_dest.destination_id',  '=', 'destinations.id')
            ->where('class_fodors.id', '=', 2)
            ->where('destinations.id_path', 'LIKE', $first_like)
            ->groupBy('keywords.name')->get();

        $prices = [];

        foreach ($keywords as $keyword){
            if ($keyword->name=='$' || $keyword->name=='$$' || $keyword->name=='$$$' || $keyword->name=='$$$$'){
                array_push($prices, $keyword);
                unset($keyword);
            }
        }

        $restaurants = $this->get_restaurants($restaurants_fodor, $place);

        $areas = DB::table('point_class')
            ->selectRaw('COUNT(destinations.name) AS count, destinations.name AS name')
            ->join('class_fodors', 'point_class.class_fodor_id','=', 'class_fodors.id')
            ->join('point_of_interests', 'point_class.point_of_interest_id', '=', 'point_of_interests.id')
            ->join('point_dest', 'point_dest.point_of_interest_id', '=', 'point_of_interests.id')
            ->join('destinations', 'point_dest.destination_id', '=', 'destinations.id')
            ->where('class_fodors.id', '=', 2)
            ->where('destinations.id_path', 'LIKE', $first_like)
            ->groupBy('destinations.name')->get();

        return view('layouts.components.places.restaurants_all', ['place' => $place, 'restaurants' => $restaurants, 'areas' => $areas, 'keywords' => $keywords, 'prices' => $prices, 'area1' => $area1, 'destination'=>$destination]);
    }

    function more_data(Request $request)
    {

        $place = $request->place;
        $city = $request->citi;

        $area1 = $request->area;

        $area = explode(',',$area1);

        if ($city){
            $des = $city;
        }else{
            $des = $place;
        }

        if ($request->ajax()) {

            $skip = $request->skip;


            $destination = Destination::firstWhere('slug', $des);

            $restaurants_fodor = $this->get_res_db($destination, $skip, $area);

            $restaurants = $this->get_restaurants($restaurants_fodor, $request->place);

            return response()->json($restaurants);
        } else {
            return response()->json('Direct Access Not Allowed!!');
        }
    }

    function get_restaurants($restaurants_fodor, $place)
    {
        $restaurants = [];
        $restaurants_yelp = [];

        $yelpKey = "b0m0daCOzC6tcQFmCzoM-m_bwQaUrSRLkCgfnfh9I0b-6V6pl-ulNwhmhhNJBYMHZWe5aRTTyFEZCgHed5D98vfKWi-O0gICydGGHVYs3ia9qc3qwZYo0Xcc7KsLXnYx";
        $yelpClient = new Client(['base_uri' => 'https://api.yelp.com/v3/']);


        foreach ($restaurants_fodor as $restaurant) {
            $name = $restaurant->name;
            $name = $this->delete_accent($name);
            $address = urlencode($restaurant->street_address);
            $city = $restaurant->city;
            $state = $this->get_state($place);

            $temp_url = 'businesses/matches?name=' . $name . '&address1=' . $address . '&city=' . $city . '&state=' . $state . '&country=US';
            try {
                $restaurant_yelp = json_decode($yelpClient->request('GET', $temp_url, ['headers' => ['Authorization' => 'Bearer ' . $yelpKey]])->getBody(), true)['businesses'];
                if (count($restaurant_yelp) > 0)
                    array_push($restaurants_yelp, array(
                        'alias' => $restaurant_yelp[0]['alias'],
                        'id' => $restaurant_yelp[0]['id'],
                        'REVIEW_SNIPPET' => $restaurant->review_snippet,
                        'KEYWORDS'=> $restaurant->keywords,
                        'city'=>$restaurant->city,
                        'destination'=> $restaurant->destinations
                    ));
            } catch (Exception $e) {
            }

        }

        foreach ($restaurants_yelp as $restaurant) {
            $id = urlencode($restaurant['alias']);
            $url = 'businesses/' . $id;
            $res = json_decode($yelpClient->request('GET', $url, ['headers' => ['Authorization' => 'Bearer ' . $yelpKey]])->getBody(), true);
            array_push($restaurants, array(
                'name' => $res['name'],
                'alias' => $res['alias'],
                'rating' => $res['rating'],
                'review_count' => $res['review_count'],
                'price' => array_key_exists('price', $res) ? $res['price']: "-",
                'id' => $res['id'],
                'review' => $restaurant['REVIEW_SNIPPET'],
                'image_url' => $res['image_url'],
                'KEYWORDS'=> $restaurant['KEYWORDS'],
                'city'=>$restaurant['city'],
                'DESTINATIONS'=>$restaurant['destination']
            ));
        }
        return $restaurants;
    }


    //TODO: Make this a helper method
    function delete_accent($cadena)
    {

        //Reemplazamos la A y a
        $cadena = str_replace(
            array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
            array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
            $cadena
        );

        //Reemplazamos la E y e
        $cadena = str_replace(
            array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
            array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
            $cadena);

        //Reemplazamos la I y i
        $cadena = str_replace(
            array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
            array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
            $cadena);

        //Reemplazamos la O y o
        $cadena = str_replace(
            array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
            array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
            $cadena);

        //Reemplazamos la U y u
        $cadena = str_replace(
            array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
            array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
            $cadena);

        //Reemplazamos la N, n, C y c
        $cadena = str_replace(
            array('Ñ', 'ñ', 'Ç', 'ç'),
            array('N', 'n', 'C', 'c'),
            $cadena
        );

        return $cadena;
    }

    function get_state($place)
    {
        switch ($place) {
            case "florida":
                $destID = "FL";
                break;

            case "new-york-city":
                $destID = "NY";
                break;

            case "hawaii":
                $destID = "HW";
                break;

            case "boston":
                $destID = "BT";
                break;

            case "washington-dc":
                $destID = "WD";
                break;

            case "california":
                $destID = "CA";
                break;

            default:
                $destID = "US";
                break;
        }

        return $destID;
    }
}
