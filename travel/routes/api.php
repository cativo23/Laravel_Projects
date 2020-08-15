<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::namespace('API')->group(function (){
    Route::get('/all', 'DestinationAPIController@GetDestination');
    Route::get('dns', 'DestinationAPIController@GetDnsInfo');
    // TODO: comment this line, is just for testing
    //Route::post('/site-config', 'DestinationAPIController@AddSiteConfig');
    //Route::put('/site-config', 'DestinationAPIController@UpdateSiteConfig');
});
