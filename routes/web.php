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

use Chencha\Share\Share;
use Illuminate\Support\Facades\Auth;

Route::get('/admin', function () {
    return view('home');
});

Auth::routes();
Route::get('/',[
    'uses' => 'BlogController@index',
    'as'=> 'blog_pages.main'
]);


Route::get('/news/{slug}',[
    'uses' => 'BlogController@newsInfo',
    'as'=> 'blog_pages.news'
]);
Route::post('/mailChim','BlogController@mailChim');

Route::get('/news_list',[
    'uses' => 'BlogController@news_list',
    'as'=> 'blog_pages.news_list'
]);
Route::get('/agency_list',[
    'uses' => 'BlogController@agency_list',
    'as'=> 'blog_pages.agency_list'
]);
Route::get('/artists_list',[
    'uses' => 'BlogController@artists_list',
    'as'=> 'blog_pages.artists_list'
]);

Route::get('/admin', 'HomeController@index')->name('admin');

Route::get('{path}', 'HomeController@index')->where('path','([A-z\d-\/_.]+)?');

