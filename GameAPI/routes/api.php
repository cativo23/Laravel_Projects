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


Route::namespace('Api')->group(function (){
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('register', 'AuthController@register')->name('register');
    Route::middleware('auth:api')->group(function (){
        Route::get('user_detail', 'AuthController@user_detail');
        Route::post('logout', 'AuthController@logout');
        Route::post('set_score/{user}', 'AccountController@setScore');
        Route::post('set_level/{user}', 'AccountController@setLevel');
        Route::post('set_answer/{user}', 'AccountController@setAnswers');
    });
});
