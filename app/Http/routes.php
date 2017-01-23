<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/welcome', 'HomeController@index');
Route::get('/show_modal', 'HomeController@show_embed_modal');
Route::post('/save-url','HomeController@save_url');

Route::get('/get_videos','HomeController@get_videos');
Route::post('/search_videos','HomeController@search_videos');
Route::auth();

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('/home', 'HomeController@index');

Route::match(['post','get'], '/profile', 'HomeController@profile');

Route::get('/open_model', 'HomeController@open_model');

Route::match(['get','post'], '/browse', 'HomeController@browse');

Route::get('logout','Auth\AuthController@logout');
