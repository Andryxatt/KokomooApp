<?php

use Illuminate\Http\Request;

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



Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();
});
Route::apiResources([
    'user'=>'API\UserController'
]);
Route::apiResources([
    'MainTitleLeft'=>'API\MainTitleLeftController'
]);
Route::apiResources([
    'Artist'=>'API\ArtistController'
]);
Route::apiResources([
    'NewsArtist'=>'API\NewsArtistController'
]);
Route::apiResources([
    'NewsContent'=>'API\NewsContentController'
]);
Route::apiResources([
    'Agency'=>'API\AgencyController'
]);
Route::apiResources([
    'MainContent'=>'API\MainContentController'
]);
Route::get('profile', 'API\UserController@profile');
Route::put('profile', 'API\UserController@updateProfile');