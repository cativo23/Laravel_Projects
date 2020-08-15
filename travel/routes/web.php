<?php

use App\Destination;
use GuzzleHttp\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
 * Loading Routes
 */
//Route::get('load', 'IndexController@load_data');
//Route::get('rest', 'IndexController@load_rest');




Auth::routes(['verify'=>true]);

Route::get('/destination/{place}', 'PlaceController@parent');
Route::get('/destination/{place}/city/{city}', 'PlaceController@child');


//Main Site Sections and Destinations Routes to edit

Route::post('/header-image-upload', 'Admin\DestinationController@header_image_upload')->name('header-upload');

Route::post('/video-upload', 'Admin\DestinationController@video_upload')->name('video-upload');

Route:: domain(config('app.admin_url'))->middleware([ 'auth','verified'])->as('admin.')->namespace('Admin')->group(function () {
    Route::middleware(['approved'])->group(function (){
        Route::resource('destinations', 'DestinationController');
        Route::resource('things2do', 'Things2DoController');
        Route::resource('hotels1', 'HotelsController');
        Route::resource('galleries', 'GalleryController');
        Route::resource('images', 'ImageController');
        Route::resource('articles', 'ArticleController');
        Route::resource('activities', 'ActivityController');
        Route::resource('best-for-types', 'BestForTypeController');
        Route::resource('sections', 'SectionController');
        Route::resource('cons', 'ConsController');
        Route::resource('pros', 'ProController');
        Route::resource('pois', 'PointOfInterestController');
        Route::resource('keywords', 'KeywordController');
        Route::resource("servers", "ServerController");
        Route::redirect('/', '/home', 301);
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('download_images', 'DownloadImagesController@index')->name('download.index');
        Route::get('download/{destination}', 'DownloadImagesController@download')->name('download');
        Route::get('download_images/{destination}', 'DownloadImagesController@images')->name('download.images');
        Route::patch('update-images/{destination}', 'DownloadImagesController@update_images')->name('update.images');
        Route::get('articles/create/{destination}', 'ArticleController@create_with_dest')->name('create_art_dest');
        Route::post('articles/store/{destination}', 'ArticleController@store_with_dest')->name('store_art_dest');
        Route::middleware(['admin'])->namespace('Super')->group(function () {
            Route::get('/users', 'UserController@index')->name('users.index');
            Route::get('/users/{user_id}/approve', 'UserController@approve')->name('users.approve');
            Route::get('/users/{user_id}/disapprove', 'UserController@disapprove')->name('users.disapprove');
        });
    });
    Route::get('/approval', 'HomeController@approval')->name('approval');
});

Route::get('/', 'IndexController@index')->name('index');

Route::get('/about', 'InformationController@about')->name('about.country');
Route::get('/destination/{place}/about', 'InformationController@about')->name('about.place');
Route::get('/destination/{place}/city/{city}/about','InformationController@about')->name('about.city');

Route::get('/privacy', 'InformationController@privacy')->name('privacy.country');
Route::get('/destination/{place}/privacy', 'InformationController@privacy')->name('privacy.place');
Route::get('/destination/{place}/city/{city}/privacy', 'InformationController@privacy')->name('privacy.city');

Route::get('/terms', 'InformationController@terms')->name('terms.country');
Route::get('/destination/{place}/terms', 'InformationController@terms')->name('terms.place');
Route::get('/destination/{place}/city/{city}/terms', 'InformationController@terms')->name('terms.city');


Route::get('/packages', 'BookingController@packages');

Route::get('/flights/', function () {
    $destination = Destination::firstWhere('fodor_id', env('MAIN_DESTINATION_ID'));
    return view('flights',   ['destination'=>$destination]);
});

Route::get('/cars/', function () {
    $destination = Destination::firstWhere('fodor_id', env('MAIN_DESTINATION_ID'));
    return view('cars', ['destination'=>$destination]);
});

Route::get('/shuttles/', function () {
    $destination = Destination::firstWhere('fodor_id', env('MAIN_DESTINATION_ID'));
    return view('shuttles', ['destination'=>$destination]);
});

Route::get('/hotels/', function () {
    $destination = Destination::firstWhere('fodor_id', env('MAIN_DESTINATION_ID'));
    return view('hotels',  ['destination'=>$destination]);
});

Route::get('/tours/', function(){
    $destination = Destination::firstWhere('fodor_id', env('MAIN_DESTINATION_ID'));
    return view('adventure',  ['destination'=>$destination]);
});

Route::get('/adventure/', function(){
    $destination = Destination::firstWhere('fodor_id', env('MAIN_DESTINATION_ID'));
    return view('adventure',  ['destination' => $destination]);
});


Route::get('/destination/{place}/packages/', function ($place) {
    $destination = Destination::firstWhere('slug', $place);
    return view('packages', ['destination'=>$destination]);
});

Route::get('/destination/{place}/flights/', function ($place) {
    $destination = Destination::firstWhere('slug', $place);
    return view('flights', ['destination'=>$destination]);
});

Route::get('/destination/{place}/cars/', function ($place) {
    $destination = Destination::firstWhere('slug', $place);
    return view('cars', ['destination'=>$destination]);
});

Route::get('/destination/{place}/shuttles/', function ($place ) {
    $destination = Destination::firstWhere('slug', $place);
    return view('shuttles', ['destination'=>$destination]);
});

Route::get('/destination/{place}/hotels/', function ($place) {
    $destination = Destination::firstWhere('slug', $place);
    return view('hotels',['destination'=>$destination]);
});

Route::get('/destination/{place}/tours/', function($place){
    $destination = Destination::firstWhere('slug', $place);
    return view('adventure', ['destination'=>$destination]);
});

Route::get('/destination/{place}/adventure/', function($place){
    $destination = Destination::firstWhere('slug', $place);
    return view('adventure', ['destination'=>$destination]);
});


Route::get('/destination/{place}/city/{citi}/packages/', function ($place, $citi) {
    $destination = Destination::firstWhere('slug', $citi);
    return view('packages',  ['destination'=>$destination]);
});

Route::get('/destination/{place}/city/{citi}/flights/', function ($place, $citi) {
    $destination = Destination::firstWhere('slug', $citi);
    return view('flights',['destination'=>$destination]);
});

Route::get('/destination/{place}/city/{citi}/cars/', function ($place, $citi) {
    $destination = Destination::firstWhere('slug', $citi);
    return view('cars', ['destination'=>$destination]);
});

Route::get('/destination/{place}/city/{citi}/shuttles/', function ($place, $citi) {
    $destination = Destination::firstWhere('slug', $citi);
    return view('shuttles', ['destination'=>$destination]);
});

Route::get('/destination/{place}/city/{citi}/hotels/', function ($place, $citi) {
    $destination = Destination::firstWhere('slug', $citi);
    return view('hotels', ['destination'=>$destination]);
});

Route::get('/destination/{place}/city/{citi}/tours/', function($place, $citi){
    $destination = Destination::firstWhere('slug', $citi);
    return view('adventure', ['destination'=>$destination]);
});

Route::get('/destination/{place}/city/{citi}/adventure/', function($place, $citi){
    $destination = Destination::firstWhere('slug', $citi);
    return view('adventure', ['destination'=>$destination]);
});

Route::get('/gallery/', 'GalleryController1@index');

Route::get('/destination/{place}/gallery/', 'GalleryController1@index');

Route::get('/destination/{place}/city/{citi}/gallery/','GalleryController1@index');


// Restaurants Routes to list and show
Route::get('/restaurants', 'RestaurantsController@index')->name('restaurants');
Route::get('/destination/{place}/city/{citi}/restaurants', 'RestaurantsController@get')->name('restaurants_city');


Route::get('/destination/{place}/restaurants','RestaurantsController@get')->name('restaurants_place');
Route::get('restaurants/{restaurant}', 'RestaurantsController@show_rest')->name('show_rest');
Route::get('/destination/{place}/city/{city}/restaurants/{restaurant}', 'RestaurantsController@show_rest')->name('show_rest');


Route::get('/destination/{place}/restaurants/{restaurant}', 'RestaurantsController@show_rest')->name('show_rest');

//More Info Routes
Route::get("/sights", 'MoreController@sights')->name("sights");

Route::get("/destination/{place}/sights", 'MoreController@sights')->name("sights_place");

Route::get("/destination/{place}/city/{city}/sights", 'MoreController@sights')->name("sights_city");

Route::get("/sights/{code}", 'MoreController@sight_detail')->name("sights_detail")->where(['code'=>'[0-9]+']);

Route::get("/destination/{place}/sights/{code}", 'MoreController@sight_detail')->name("sights_place_details")->where(['code'=>'[0-9]+']);

Route::get("/destination/{place}/city/{city}/sights/{code}", 'MoreController@sight_detail')->name("sights_city_details")->where(['code'=>'[0-9]+']);


Route::get("/shopping", 'MoreController@shopping')->name("shopping");

Route::get("/destination/{place}/shopping", 'MoreController@shopping')->name("shopping_place");

Route::get("/destination/{place}/city/{city}/shopping", 'MoreController@shopping')->name("shopping_city");

Route::get("/shopping/{code}", 'MoreController@shopping_detail')->name("shopping_detail")->where(['code'=>'[0-9]+']);

Route::get("/destination/{place}/shopping/{code}", 'MoreController@shopping_detail')->name("shopping_place_details")->where(['code'=>'[0-9]+']);

Route::get("/destination/{place}/city/{city}/shopping/{code}", 'MoreController@shopping_detail')->name("shopping_city_details")->where(['code'=>'[0-9]+']);


Route::get("/nightlife", 'MoreController@nightlife')->name("nightlife");

Route::get("/destination/{place}/nightlife", 'MoreController@nightlife')->name("nightlife_place");

Route::get("/destination/{place}/city/{city}/nightlife", 'MoreController@nightlife')->name("nightlife_city");

Route::get("/nightlife/{code}", 'MoreController@nightlife_detail')->name("nightlife_detail")->where(['code'=>'[0-9]+']);

Route::get("/destination/{place}/nightlife/{code}", 'MoreController@nightlife_detail')->name("nightlife_place_details")->where(['code'=>'[0-9]+']);

Route::get("/destination/{place}/city/{city}/nightlife/{code}", 'MoreController@nightlife_detail')->name("nightlife_city_details")->where(['code'=>'[0-9]+']);


Route::get("/arts", 'MoreController@art')->name("art");
Route::get("/destination/{place}/arts", 'MoreController@art')->name("art_place");
Route::get("/destination/{place}/city/{city}/arts", 'MoreController@art')->name("art_city");
Route::get("/arts/{code}", 'MoreController@art_detail')->name("art_detail")->where(['code'=>'[0-9]+']);
Route::get("/destination/{place}/arts/{code}", 'MoreController@art_detail')->name("art_place_details")->where(['code'=>'[0-9]+']);
Route::get("/destination/{place}/city/{city}/arts/{code}", 'MoreController@art_detail')->name("art_city_details")->where(['code'=>'[0-9]+']);


Route::get("/activities/{id}", 'MoreController@activity');
Route::get("/destination/{place}/activities/{id}", 'MoreController@activity');
Route::get("/destination/{place}/city/{city}/activities/{id}", 'MoreController@activity');
Route::get('/article/{id}', 'MoreController@article');
Route::get('/destination/{place}/article/{id}', 'MoreController@article');
Route::get('/destination/{place}/city/{city}/article/{id}', 'MoreController@article');


Route::get('/load-more-res', 'RestaurantsController@more_data');


//Leads form route, after sending info gets back to the previous route
Route::post('leads', function (Request $request) {
    $message = '';
    $prev = '';
    if (request()->method() == 'POST') {
        $name = request()->get('username') . ' ' . request()->get('lastname');
        $phone = request()->get('phone');
        $email = request()->get('email');
        $city = request()->get('city');
        $code = request()->get('coded');
        $province = request()->get('city');
        $prev = request()->get('prev');
        $custom_fields = "{\"destinatiom\":\"" . request()->get('destination') . "\",\"num_passengers\":\"" . request()->get('num_passengers'). "\",\"budget_per_person\":\"" . request()->get('budget') . "\",\"departure_date\":\"" . request()->get('departure') . "\"}";
        Log::info($name . " " . $phone . " " . $city . " " . $email . " " . $code . " " . $province . " " . $custom_fields);

        $leadsClient = new Client(['base_uri' => 'https://more.ttand.org/api/v1/customers/lead']);
        $response = $leadsClient->request('POST', '', [
            'json' => [
                'name' => $name,
                "phone" => $phone,
                "email" => $email,
                "city" => $city,
                "postalCode" => $code,
                "province" => $province,
                "message" => "Test Message",
                "customFields" => $custom_fields,
                "sourceId" => "5ae74f26f3d0f417f31ac9b5",
                "authKey" => "Sc@xL$@s8YJ*5L5zMr&Euze3ws7AVqCE"
            ]
        ]);
        $result = json_decode($response->getBody(), true)['success'];
        if ($result){
            $message = "Information has been sent!";
        }else{
            $message= "Something went wrong!";
        }

    }
    return redirect($prev)->with('message',$message);
});
