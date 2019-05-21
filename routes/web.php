<?php

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

use Illuminate\Support\Facades\Auth;

Route::get('/home', function () {
    return view('home');
});

Auth::routes();
Route::get('/blog',[
    'uses' => 'BlogController@index',
    'as'=> 'blog_pages.main'
]);
Route::get('/blog/news/{id}',[
    'uses' => 'BlogController@newsInfo',
    'as'=> 'blog_pages.news'
]);
Route::post('/blog/mailChim','BlogController@mailChim');

Route::get('/blog/news_list',[
    'uses' => 'BlogController@news_list',
    'as'=> 'blog_pages.news_list'
]);
Route::get('/blog/agency_list',[
    'uses' => 'BlogController@agency_list',
    'as'=> 'blog_pages.agency_list'
]);
Route::get('/blog/artists_list',[
    'uses' => 'BlogController@artists_list',
    'as'=> 'blog_pages.artists_list'
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('{path}', 'HomeController@index')->where('path','([A-z\d-\/_.]+)?');

