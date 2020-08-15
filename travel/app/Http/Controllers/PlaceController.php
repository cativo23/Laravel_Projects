<?php

namespace App\Http\Controllers;

use App\Destination;
use DB;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

    //TODO: Remove Duplicated code, rethink logic to make it more performant

    /**
     * Yelp Api Client
     *
     * @var Client
     */
    protected $yelpClient = '';

    /**
     * Yelp Api Key
     *
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
     * Makes a yelp request and returns the decoded json
     *
     * @param string $uri
     * @return mixed
     */
    public function make_yelp_request(string $uri){
        return json_decode($this->yelpClient->request('GET', $uri , ['headers' => ['Authorization' => 'Bearer '.$this->yelpApiKey]])->getBody(), true);
    }


    public function parent(Request $request)
    {
        $place = $request->place;

        $restaurants = $this->make_yelp_request('businesses/search?location=' . $place . '&sort_by=rating&limit=4&categories=restaurants');

        $destination = Destination::where('slug', $place)->first();

        if ($destination == null){
            abort(404);
        }

        $preview = $destination->preview_gallery();


        //Todo: GET RESTAURANTS OF DB
        $slug = $destination->slug;
        if ( $slug == 'florida'){
            $restaurants = $this->make_yelp_request('businesses/search?location=orlando&sort_by=rating&limit=4&categories=restaurants');
        }

        $message = session('message');

        $dropdownDestinationValueTour = '';
        $dropdownDestinationValueHotel = '';

        switch ($slug) {
            case "hawaii":
                $dropdownDestinationValueHotel = "Honolulu";
                break;
        }

        $more_rest = $destination->rest_art();
        $more_do = $destination->do_art();

        $count_sight = $this->get_class_fodor_pois_count(1, $destination->fodor_id,$destination->name, 0, -1);
        $count_shopping = $this->get_class_fodor_pois_count(4, $destination->fodor_id,$destination->name, 0, -1);
        $count_nightlife = $this->get_class_fodor_pois_count(5,  $destination->fodor_id,$destination->name, 0,-1);
        $count_art = $this->get_class_fodor_pois_count(6, $destination->fodor_id,$destination->name, 0, -1);

        $areas = explode(',', $destination->rest_areas);

        $areas_count = [];

        foreach ($areas as $area){
            array_push($areas_count, $this->get_rest_by_areas($destination->fodor_id, $area));
        }

        return view('place',
            compact('restaurants',
                'message', 'destination',
                'dropdownDestinationValueTour',
                'dropdownDestinationValueHotel', 'preview', 'more_rest', 'more_do', 'count_art', 'count_nightlife', 'count_shopping', 'count_sight', 'areas_count'
            ));
    }

    public function child(Request $request){
        $city = $request->city;

        $restaurants = $this->make_yelp_request('businesses/search?location=' . $city . '&sort_by=rating&limit=4&categories=restaurants');

        $destination = Destination::where('slug', $city)->first();

        if ($destination==null){
            abort(404);
        }

        $preview = $destination->preview_gallery();

        //Todo: GET RESTAURANTS OF DB
        $slug = $destination->slug;
        if ( $slug == 'florida'){
            $restaurants = $this->make_yelp_request('businesses/search?location=orlando&sort_by=rating&limit=4&categories=restaurants');
        }

        $message = session('message');

        $dropdownDestinationValueTour = '';
        $dropdownDestinationValueHotel = '';

        $more_rest = $destination->rest_art();
        $more_do = $destination->do_art();

        $count_sight = $this->get_class_fodor_pois_count(1, $destination->fodor_id,$destination->name, 0, -1);
        $count_shopping = $this->get_class_fodor_pois_count(4, $destination->fodor_id,$destination->name, 0, -1);
        $count_nightlife = $this->get_class_fodor_pois_count(5,  $destination->fodor_id,$destination->name, 0,-1);
        $count_art = $this->get_class_fodor_pois_count(6, $destination->fodor_id,$destination->name, 0, -1);

        $areas = explode(',', $destination->rest_areas);

        $areas_count = [];

        foreach ($areas as $area){
            array_push($areas_count, $this->get_rest_by_areas($destination->fodor_id, $area));
        }

        return view('place',
            compact('restaurants',
                'message', 'destination',
                'dropdownDestinationValueTour',
                'dropdownDestinationValueHotel', 'preview', 'more_rest', 'more_do', 'count_art', 'count_nightlife', 'count_shopping', 'count_sight', 'areas_count'
            ));
    }

    public function get_class_fodor_pois_count(int $class, int $fodor_id, string $name,  int $skip, int $take){

        $first_like = "%|".$fodor_id."%";
        $name = "%|".$name."%";

        $pois_db =  DB::table('point_class')
            ->selectRaw('count(point_of_interests.id) as count_id')
            ->join('point_of_interests', 'point_class.point_of_interest_id', '=', 'point_of_interests.id')
            ->join('class_fodors', 'point_class.class_fodor_id','=', 'class_fodors.id')
            ->join('point_dest', 'point_dest.point_of_interest_id', '=', 'point_of_interests.id')
            ->join('destinations', 'point_dest.destination_id', '=', 'destinations.id')
            ->where('class_fodors.id', '=', $class)
            ->where('destinations.id_path', 'LIKE', $first_like)
            ->where('destinations.name_path', 'LIKE', strtolower($name));


        if($take >= 0 && $skip >=0){
            $pois_db = $pois_db->skip($skip)->take($take);
        }

        if($take >= 0 && $skip >=0){
            $pois_db = $pois_db->skip($skip)->take($take);
        }

        return $pois_db->get()->toArray()[0]->count_id;
    }

    public function get_rest_by_areas($fodor_id, $area){
        $first_like = "%|".$fodor_id."|%";
        $area1 = "%".$area."%";

        $rest_db =  DB::table('point_class')
            ->selectRaw('COUNT(destinations.name) AS count')
            ->join('class_fodors', 'point_class.class_fodor_id','=', 'class_fodors.id')
            ->join('point_of_interests', 'point_class.point_of_interest_id', '=', 'point_of_interests.id')
            ->join('point_dest', 'point_dest.point_of_interest_id', '=', 'point_of_interests.id')
            ->join('destinations', 'point_dest.destination_id', '=', 'destinations.id')
            ->where('class_fodors.id', '=', 2)
            ->where('destinations.id_path', 'LIKE', $first_like)
            ->where('destinations.slug', 'LIKE', $area1)->get();

        return array(['area'=>$area, 'count'=> $rest_db[0]->count ?? 0]);
    }
}
