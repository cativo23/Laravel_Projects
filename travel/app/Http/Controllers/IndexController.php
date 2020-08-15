<?php

namespace App\Http\Controllers;

use App\Activity;
use App\BestForType;
use App\ClassFodor;
use App\ClassOverview;
use App\Cons;
use App\Destination;
use App\Feature;
use App\ImageFodor;
use App\Keyword;
use App\Overview;
use App\Phones;
use App\PointOfInterest;
use App\Pro;
use App\ReferenceListing;
use App\Restaurant;
use App\RestaurantCategory;
use App\RestaurantPhotos;
use App\Traits\UploadTrait;
use App\TravelTip;
use App\Trip;
use DB;
use GuzzleHttp\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Mockery\Exception;
use function response;

//TODO: MUST GET RESTAURANTS FROM DB
class IndexController extends Controller
{
    use UploadTrait;

    /**
     * Yelp Api Client
     *
     * @var Client
     */
    protected $yelpClient = '';

    public $id = [];

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
    public function make_yelp_request(string $uri)
    {
        return json_decode($this->yelpClient->request('GET', $uri, ['headers' => ['Authorization' => 'Bearer ' . $this->yelpApiKey]])->getBody(), true);
    }

    /**
     * Main Site Index, shows the info according main site configurations
     *
     * @param Request $request
     * @return Application|Factory|RedirectResponse|View
     */
    public function index(Request $request)
    {
        if ($request->getHost() == 'admin.' . parse_url(config('app.admin_url'), PHP_URL_HOST)){
            return redirect()->route('admin.home');
        }

        $restaurants_uri = 'businesses/search?location=usa&sort_by=rating&limit=4&categories=restaurants';

        $restaurants = $this->make_yelp_request($restaurants_uri);

        $messageSuccess = session('message');

        $destination = Destination::firstWhere('fodor_id', env('MAIN_DESTINATION_ID'));

        $more_rest = $destination->rest_art();
        $more_do = $destination->do_art();

        $count_sight = $this->get_class_fodor_pois_count(1, $destination->fodor_id, 0, -1);
        $count_shopping = $this->get_class_fodor_pois_count(4, $destination->fodor_id, 0, -1);
        $count_nightlife = $this->get_class_fodor_pois_count(5, $destination->fodor_id, 0, -1);
        $count_art = $this->get_class_fodor_pois_count(6, $destination->fodor_id, 0, -1);

        $areas = explode(',', $destination->rest_areas);

        $areas_count = [];

        foreach ($areas as $area){
            array_push($areas_count, $this->get_rest_by_areas($destination->fodor_id, $area));
        }
        $gallery_preview = $destination->MainGallery()->preview();

        return view('index',
            compact(
                'restaurants', 'messageSuccess', 'destination', 'gallery_preview', 'more_rest', 'more_do', 'count_art', 'count_nightlife', 'count_shopping', 'count_sight', 'areas_count'
            ));
    }

    public function get_class_fodor_pois_count(int $class, int $fodor_id, int $skip, int $take){

        $first_like = "%|".$fodor_id."|%";

        $pois_db =  DB::table('point_class')
            ->selectRaw('count(point_of_interests.id) as count_id')
            ->join('point_of_interests', 'point_class.point_of_interest_id', '=', 'point_of_interests.id')
            ->join('class_fodors', 'point_class.class_fodor_id','=', 'class_fodors.id')
            ->join('point_dest', 'point_dest.point_of_interest_id', '=', 'point_of_interests.id')
            ->join('destinations', 'point_dest.destination_id', '=', 'destinations.id')
            ->where('class_fodors.id', '=', $class)
            ->where('destinations.id_path', 'LIKE', $first_like);

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
            ->where('destinations.name_path', 'LIKE', $area1)->get();

        return array(['area'=>$area, 'count'=> $rest_db[0]->count]);
    }

    public function edit_info()
    {
        $site = Destination::firstWhere('fodor_id', 3);
        return view('site.update_info', compact('site'));
    }

    function saveImage(Destination $site, Request $request)
    {

        if ($request->has('call_image')) {
            // Get image file
            $image = $request->file('call_image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')) . '_' . time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $site->call_image = $filePath;
        }

        return $site;
    }


    public function load_rest()
    {
        try {
            $fodor_info_folder = "FodorInfo\\";
            $text = "Finished Correctly";
            $this->rest($fodor_info_folder);
        } catch (Exception $e) {
            $text = "Error Found\n";
            $text = $text . $e;
        }
        return response($text);
    }

    public function load_data()
    {
        try {
            $fodor_info_folder = "FodorInfo\\";
            $text = "Finished Correctly";
            // $this->load_classes($fodor_info_folder);
            //  $this->load_best($fodor_info_folder);
            // $this->load_key($fodor_info_folder);
            // $this->load_destinations($fodor_info_folder);
             $this->load_pois($fodor_info_folder);
        } catch (Exception $e) {
            $text = "Error Found\n";
            $text = $text . $e;
        }
        return response($text);
    }

    function json_validator($data=NULL) {
        if (!empty($data)) {
            @json_decode($data);
            return (json_last_error() === JSON_ERROR_NONE);
        }
        return false;
    }

    public function load_pois($fodor_info_folder)
    {
        $destinations_root_folder = resource_path($fodor_info_folder . 'pois');
        $files = scandir($destinations_root_folder);
        $pois = array_diff($files, array('.', '..'));
        $total1 = 0;
        $totalpos = count($pois);
        foreach ($pois as $poi1) {
            if ($poi1 != "." || $poi1 != "..") {
                $json_string =file_get_contents(resource_path("FodorInfo" . DIRECTORY_SEPARATOR . "pois" . DIRECTORY_SEPARATOR . $poi1));
                if ($this->json_validator($json_string)){
                    Log::info("El archivo ".$poi1 . ' es valido');
                }else{
                    Log::info("El archivo ".$poi1 . ' es invalido');
                }
                $poi_json = json_decode($json_string);
                $prev_poi = PointOfInterest::where('fodor_id', $poi_json->ID)->first();
                if ($prev_poi != null) {
                    Log::info("Saved ID ". $prev_poi->id );
                } else {
                    Log::info("PROCESSING: " . $poi1);
                    $phones = $poi_json->PHONES;
                    $pros = $poi_json->PROS;
                    $cos = $poi_json->CONS;
                    $classes = $poi_json->CLASSES;
                    $keywords = $poi_json->KEYWORDS;
                    $destinations = $poi_json->DESTINATIONS;

                    $poi = new PointOfInterest([
                        'name' => $poi_json->NAME,
                        'fodor_id' => (int)$poi_json->ID,
                        'latitude' => $poi_json->GEOCODE->LAT,
                        'longitude' => $poi_json->GEOCODE->LONG,
                        'email' => $poi_json->EMAIL,
                        'web' => $poi_json->WEB,
                        'review' => $poi_json->REVIEW,
                        'review_snippet' => $poi_json->REVIEW_SNIPPET,
                        'admission' => $poi_json->DETAILS->ADMISSION,
                        'card_policy' => $poi_json->DETAILS->CARD_POLICY,
                        'open_hours' => $poi_json->DETAILS->OPEN_HOURS,
                        'closed_hours' => $poi_json->DETAILS->CLOSED_HOURS,
                        'res_policy' => $poi_json->DETAILS->RES_POLICY,
                        'rooms' => $poi_json->DETAILS->ROOMS,
                        'meal_plans' => $poi_json->DETAILS->MEAL_PLANS,
                        'miscellaneous' => $poi_json->DETAILS->MISCELLANEOUS,
                        'slug' => Str::slug($poi_json->NAME),
                        'state' => $poi_json->ADDR->STATE->NAME,
                        'zip' => $poi_json->ADDR->ZIP,
                        'country' => $poi_json->ADDR->COUNTRY->NAME,
                        'metro' => $poi_json->ADDR->METRO,
                        'directions' => $poi_json->ADDR->DIRECTIONS,
                        'address_string' => $poi_json->ADDR->ADDRESS_STRING,
                        'prefix' => $poi_json->ADDR->PREFIX,
                        'street_address' => $poi_json->ADDR->STREET_ADDRESS,
                        'suffix' => $poi_json->ADDR->SUFFIX,
                        'neighborhood' => $poi_json->ADDR->NEIGHBORHOOD->NAME,
                        'city' => $poi_json->ADDR->CITY->NAME,
                    ]);
                    $poi->save();

                    $is_db = PointOfInterest::find($poi->id);

                    if ($is_db){
                        Log::info('El POI Se guardo corrextamente');
                    }else{
                        Log::info("El poi ". $poi->fodor_id.' no se guardo');
                    }

                    foreach ($phones as $phone) {
                        $phone_new = new Phones([
                            'fodor_id' => $phone->ID,
                            'phone_string' => $phone->PHONE_STRING,
                            'phone_desc' => $phone->PHONE_DESC,
                            'phone_seq' => $phone->PHONE_SEQ,
                            'country_code' => $phone->COUNTRY_CODE,
                            'area_code' => $phone->AREA_CODE,
                            'number' => $phone->NUMBER,
                            'extension' => $phone->EXTENSION,
                            'phone_txt' => $phone->PHONE_TXT
                        ]);
                        $poi->phones()->save($phone_new);
                    }

                    foreach ($pros as $pro) {
                        $pro_new = new Pro([
                            'text' => $pro
                        ]);
                        $poi->pros()->save($pro_new);
                    }

                    foreach ($cos as $co) {
                        $con_new = new Cons([
                            'text' => $co
                        ]);
                        $poi->cons()->save($con_new);
                    }

                    foreach ($classes as $class) {
                        $class_obj = ClassFodor::where('fodor_id', $class->ID)->first();
                        $poi45 = PointOfInterest::where('fodor_id', (int)$poi_json->ID)->first();
                        $poi45->classes()->attach($class_obj);
                    }

                    foreach ($keywords as $keyword) {
                        $key_obj = Keyword::where('fodor_id', $keyword->ID)->first();
                        $poi->keywords()->attach($key_obj);
                    }

                    foreach ($destinations as $destination) {
                        $des_obj = Destination::where('fodor_id', $destination->ID)->first();
                        $poi->destinations()->attach($des_obj);
                    }
                }
                $total1 = $total1 + 1;
                $per = ($total1 / $totalpos) * 100;
                Log::info("Processed " . $total1 . " of " . count($pois) . " " . $per . "%");
            }
        }
    }

    public function load_classes($fodor_info_folder)
    {
        $classes_json = json_decode(file_get_contents(resource_path($fodor_info_folder . 'classes.json')))->classes;
        foreach ($classes_json as $class_json) {
            $class = new ClassFodor([
                'name' => $class_json->NAME,
                'fodor_id' => $class_json->ID
            ]);
            $class->save();
        }
    }

    public function load_best($fodor_info_folder)
    {
        $best_json = json_decode(file_get_contents(resource_path($fodor_info_folder . 'best_for_types.json')))->best_for_types;
        foreach ($best_json as $item) {
            $best = new BestForType([
                'name' => $item->BESTFORNAME,
                'fodor_id' => (int)$item->BESTFORID,
            ]);
            $best->save();
        }
    }

    public function load_key($fodor_info_folder)
    {
        $keywords = json_decode(file_get_contents(resource_path($fodor_info_folder . 'keywords.json')))->keywords;
        $new_arr = array();
        foreach ($keywords as $item) {
            array_push($new_arr, (array)$item);
        }
        $this->save_key($new_arr);
    }

    public function save_key($key_array)
    {
        $ids = array_column($key_array, 'ID');
        $not_ready = array();
        array_multisort($ids, SORT_ASC, $key_array);
        foreach ($key_array as $item) {
            $can_pass = false;
            if ($item['PARENT_ID'] != $item['ID']) {
                $parent_id = $item['PARENT_ID'];
            } else {
                $parent_id = null;
                $can_pass = true;
            }
            if ($parent_id != null) {
                $parent = Keyword::where([['fodor_id', (int)$parent_id]])->first();
                if (!$parent && $parent_id != null) {
                    array_push($not_ready, $item);
                    $can_pass = false;
                } else {
                    $can_pass = true;
                }
            }
            if ($can_pass) {
                $keyword = new Keyword([
                    'name' => $item['NAME'],
                    'fodor_id' => (int)$item['ID'],
                    'parent_id' => $parent_id
                ]);
                $keyword->save();
            }
        }
        if (count($not_ready) > 0) {
            $this->save_key($not_ready);
        }
    }

    public function load_destinations($fodor_info_folder)
    {
        $destinations_root_folder = resource_path($fodor_info_folder . 'destinations/');

        $result = $this->dirToArray($destinations_root_folder);
    }

    function dirToArray($dir)
    {

        $result = array();

        $cdir = scandir($dir);

        foreach ($cdir as $key => $value) {
            if (!in_array($value, array(".", ".."))) {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                    $result[$value] = $this->dirToArray($dir . DIRECTORY_SEPARATOR . $value);
                } else {
                    $result[] = $dir . DIRECTORY_SEPARATOR . $value;
                    Log::info("--------------------");
                    Log::info("Procesando archivo: " . $value);
                    $destination_json = json_decode(file_get_contents($dir . DIRECTORY_SEPARATOR . $value));
                    $images_fodor = $destination_json->IMAGES;
                    $overview = $destination_json->OVERVIEW;
                    $class_overviews = $destination_json->CLASS_OVERVIEWS;
                    $travel_tips = $destination_json->TRAVEL_TIPS;
                    $features = $destination_json->FEATURES;
                    $activities = $destination_json->ACTIVITIES;
                    $trips = $destination_json->TRIPS;
                    if ($destination_json->ID == $destination_json->PARENT_ID) {
                        $parent_id = null;
                    } else {
                        $parent_id = $destination_json->PARENT_ID;
                    }
                    $destination = new Destination([
                        'name' => $destination_json->NAME,
                        'sequence' => 0,
                        'fodor_id' => $destination_json->ID,
                        'name_path' => $destination_json->NAME_PATH,
                        'id_path' => $destination_json->ID_PATH,
                        'geo_type' => $destination_json->GEO_TYPE,
                        'slug' => Str::slug($destination_json->NAME),
                        'parent_id' => $parent_id
                    ]);
                    $destination->save();

                    foreach ($images_fodor as $image) {
                        $image = new ImageFodor([
                            'fodor_id' => $image->ID,
                            'sequence' => $image->API_SEQUENCE_NUM,
                            'image_url' => $image->IMAGE_URL,
                            'caption' => $image->CAPTION,
                            'copyright' => $image->COPYRIGHT,
                            'usage_rights' => $image->USAGE_RIGHTS,
                            'credit' => $image->CREDIT,
                            'keyword_list' => $image->KEYWORD_LIST,
                            'destination_id' => $destination->fodor_id
                        ]);
                        $image->save();
                    }

                    $overview1 = new Overview([
                        'text' => $overview->OVERVIEW_TEXT,
                        'snippet' => $overview->OVERVIEW_TEXT_SNIPPET
                    ]);

                    $destination->overview()->save($overview1);

                    foreach ($class_overviews as $class_overview) {
                        $id_class = $class_overview->ID;
                        $e = $class_overview->CLASS_ID;
                        $class_overview_json = $this->get_data('FodorInfo\class_overview', $id_class);
                        $class1 = ClassFodor::firstWhere('fodor_id', (int)$e);
                        if ($class1 == null) {
                            $e = null;
                        }
                        $class_overview_new = new ClassOverview([
                            'fodor_id' => $id_class,
                            'snippet' => $class_overview->OVERVIEW_TEXT_SNIPPET,
                            'text' => $class_overview_json->CLASS_OVERVIEW_TEXT,
                            'destination_id' => (int)$class_overview_json->DESTINATION_ID,
                            'class_fodor_id' => $e,
                        ]);
                        $class_overview_new->save();
                    }

                    foreach ($travel_tips as $travel_tip) {
                        $id_travel_trip = $travel_tip->ID;
                        $travel_tip_json = $this->get_data('FodorInfo\travel_tips', $id_travel_trip);
                        $travel_tip_new = new TravelTip([
                            'fodor_id' => (int)$id_travel_trip,
                            'snippet' => $travel_tip_json->TEXT_SNIPPET,
                            'text' => $travel_tip_json->TEXT,
                            'destination_id' => (int)$travel_tip_json->DESTINATION_ID,
                            'title' => $travel_tip_json->title,
                            'head_id' => $travel_tip_json->HEAD->id,
                            'head_title' => $travel_tip_json->HEAD->title,
                        ]);
                        $travel_tip_new->save();
                    }

                    foreach ($features as $feature) {
                        $id_feature = $feature->ID;
                        $feature_json = $this->get_data('FodorInfo\features', $id_feature);
                        $feature_new = new Feature([
                            'fodor_id' => (int)$id_feature,
                            'title' => $feature_json->TITLE,
                            'text' => $feature_json->TEXT,
                            'snippet' => $feature_json->TEXT_SNIPPET,
                            'web_class_id' => $feature_json->WEB_CLASS_ID,
                            'class_id' => $feature_json->CLASS_ID,
                            'class' => $feature_json->CLASS,
                            'destination_id' => (int)$feature_json->DESTINATION_ID,
                        ]);
                        $feature_new->save();
                    }

                    foreach ($activities as $activity) {
                        $id_activity = $activity->ID;
                        $activity_json = $this->get_data('FodorInfo\activities', $id_activity);
                        $activity_new = new Activity([
                            'fodor_id' => $id_activity,
                            'title' => $activity_json->TITLE,
                            'text' => $activity_json->TEXT,
                            'snippet' => $activity_json->TEXT_SNIPPET,
                            'destination_id' => (int)$activity_json->DESTINATION_ID,
                        ]);
                        $activity_new->save();
                    }

                    foreach ($trips as $trip => $value1) {
                        if (is_numeric($value1)) {
                            $id_trip = $trip->ID;
                            $trip_json = $this->get_data('FodorInfo\trips', $id_trip);
                            $trip_new = new Trip([
                                'fodor_id' => (int)$id_trip,
                                'short_intro' => $trip_json->SHORT_INTRO,
                                'main_intro' => $trip_json->MAIN_INTRO,
                                'fri_text' => $trip_json->FRI_TEXT,
                                'sat_text' => $trip_json->SAT_TEXT,
                                'sun_text' => $trip_json->SUN_TEXT,
                                'url_slug' => $trip_json->URL_SLUG,
                                'did_you_know' => $trip_json->DID_YOU_KNOW,
                                'where_to_stay' => $trip_json->WHERE_TO_STAY,
                                'when_to_go' => $trip_json->WHEN_TO_GO,
                                'how_to_get_there' => $trip_json->HOW_TO_GET_THERE,
                                'image_url' => $trip_json->OVERVIEW_IMAGE->IMAGE_URL,
                                'caption' => $trip_json->OVERVIEW_IMAGE->CAPTION,
                                'credit' => $trip_json->OVERVIEW_IMAGE->CREDIT,
                                'copyright' => $trip_json->OVERVIEW_IMAGE->COPYRIGHT,
                                'usage_rights' => $trip_json->OVERVIEW_IMAGE->USAGE_RIGHTS,
                                'keyword_list' => $trip_json->OVERVIEW_IMAGE->KEYWORD_LIST,
                                'latitude' => $trip_json->GEOCODE->LAT,
                                'longitude' => $trip_json->GEOCODE->LONG,
                            ]);
                            $trip_new->save();
                            $des = Destination::find($destination->id);
                            $des->trips()->attach($trip_new);

                            foreach ($trip_json->REFERENCE_LISTINGS as $reference) {
                                $reference = new ReferenceListing([
                                    'reference_listing_id' => $reference->REFERENCE_LISTING_ID,
                                    'listing_name' => $reference->LISTING_NAME,
                                    'street_address' => $reference->STREET_ADDRESS,
                                    'suffix' => $reference->SUFFIX,
                                    'city' => $reference->CITY,
                                    'state' => $reference->STATE,
                                    'phone' => $reference->PHONE,
                                    'web' => $reference->WEB,
                                    'latitude' => $reference->LATITUDE,
                                    'longitude' => $reference->LONGITUDE,
                                ]);

                                $trip_new->reference_listings()->save($reference);
                            }
                        }
                    }
                }
            }
        }

        return $result;
    }

    public function get_data($folder, $id)
    {
        $folder_dir = resource_path($folder);
        $path = '~^' . $id . '_page.*\.json$~';
        $res = array_values(preg_grep($path, scandir($folder_dir)))[0];
        $file_path = $folder_dir . DIRECTORY_SEPARATOR . $res;
        return json_decode(file_get_contents($file_path));
    }

    private function rest(string $fodor_info_folder)
    {
        /*$categories = json_decode(file_get_contents(resource_path($fodor_info_folder . 'categories.json')));
        $new_arr = array();
        foreach ($categories as $category) {
            array_push($new_arr, (array)$category);
        }
        $this->cat($new_arr);*/

        $class_restaurant = ClassFodor::find(2);

        $restaurants = $class_restaurant->pois;

       // $restaurants_done = $this->get_restaurants($restaurants);
    }

    function get_restaurants($restaurants_fodor){
        Log::info(count($restaurants_fodor));

        foreach ($restaurants_fodor as $restaurant)
        {
            $name = $restaurant->name;
            $address = $restaurant->address_string;
            $name = $this->eliminar_acentos($name);
            $address =  substr($address, 0, 9);
            $city =$restaurant->destinations[0]->name;
            $state = 0;

            $restaurants_uri = 'businesses/matches?name='.$name.'&address1='.$address.'&city='.$city.'&state='.$state.'&country=US';

            try {
                Log::info("Trying url: ". $restaurants_uri);
                $restaurant_yelp = $restaurants = $this->make_yelp_request($restaurants_uri)['businesses'];
                if (count($restaurant_yelp)>0){
                    Log::info("Found ".count($restaurant_yelp));
                    foreach ($restaurant_yelp as $restaurant1_yelp){
                        Log::info("Is yelp name:". $restaurant1_yelp['name']. " equal to ".$restaurant->name);
                        if ($restaurant1_yelp['name']== $restaurant->name){
                            Log::info("Restaurant: ". $restaurant1_yelp['name']. " found.");
                            Log::info("Getting full yelp info for ". $restaurant1_yelp['name']);
                            $request = 'businesses/'.$restaurant1_yelp['id'];
                            $restaurant_info = $this->make_yelp_request($request);
                            $display_address = $transactions = '';
                            $photos = $restaurant_info['photos'];
                            foreach ($restaurant_info['transactions'] as $transaction){
                                $transactions .= $transaction."|";
                            }
                            foreach ($restaurant_info['location']['display_address'] as $address){
                                $display_address .= $address . " ";
                            }
                            $restaurant_new = new Restaurant([
                                'alias'=>$restaurant_info['alias'],
                                'name'=>$restaurant_info['name'],
                                'image_url'=>$restaurant_info['image_url'],
                                'is_closed'=>$restaurant_info['is_closed'],
                                'url'=>$restaurant_info['url'],
                                'phone'=>$restaurant_info['phone'],
                                'display_phone'=>$restaurant_info['display_phone'],
                                'review_count'=>$restaurant_info['review_count'],
                                'rating'=>$restaurant_info['rating'],
                                'address1'=>$restaurant_info['location']['address1'],
                                'address2'=>$restaurant_info['location']['address2'],
                                'address3'=>$restaurant_info['location']['address3'],
                                'city'=>$restaurant_info['location']['city'],
                                'state'=>$restaurant_info['location']['state'],
                                'zip'=>$restaurant_info['location']['zip_code'],
                                'country'=>$restaurant_info['location']['country'],
                                'display_address'=>$display_address,
                                'cross_streets'=>$restaurant_info['location']['cross_streets'],
                                'price'=> array_key_exists('price', $restaurant_info) ? $restaurant_info['price']: '0',
                                'transactions'=>$transactions,
                            ]);
                            Log::info($restaurant_new);
                            Log::info("Saving ".count($photos)." photos");
                            foreach ($photos as $photo){
                                $photo_new =  new RestaurantPhotos([
                                    'url'=>$photo
                                ]);
                                Log::info($photo_new);
                            }
                        }
                    }
                }
            }catch (Exception $e){

            }

        }

        return Restaurant::all();
    }



    public function cat(array $cat_arr)
    {
        $aliases = array_column($cat_arr, 'alias');
        $not_ready = array();
        array_multisort($aliases, SORT_ASC, $cat_arr);
        foreach ($cat_arr as $item) {
            $can_pass = false;
            if (count($item['parents'])>0) {
                $parent_alias = $item['parents'][0];
            } else {
                $parent_alias = null;
                $can_pass = true;
            }
            if ($parent_alias != null) {
                $parent = RestaurantCategory::where([['alias', $parent_alias]])->first();
                if (!$parent && $parent_alias != null) {
                    array_push($not_ready, $item);
                    $can_pass = false;
                } else {
                    $can_pass = true;
                }
            }
            if ($can_pass) {
                $keyword = new RestaurantCategory([
                    'alias' => $item['alias'],
                    'title' => $item['title'],
                    'parent' => $parent_alias
                ]);
                $keyword->save();
            }
        }
        if (count($not_ready) > 0) {
            $this->cat($not_ready);
        }
    }

    function eliminar_acentos($cadena){

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
            $cadena );

        //Reemplazamos la I y i
        $cadena = str_replace(
            array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
            array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
            $cadena );

        //Reemplazamos la O y o
        $cadena = str_replace(
            array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
            array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
            $cadena );

        //Reemplazamos la U y u
        $cadena = str_replace(
            array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
            array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
            $cadena );

        //Reemplazamos la N, n, C y c
        $cadena = str_replace(
            array('Ñ', 'ñ', 'Ç', 'ç'),
            array('N', 'n', 'C', 'c'),
            $cadena
        );

        return $cadena;
    }
}
