<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', "PagesController@getIndex")->name('home');
Route::get('/about', "PagesController@getAbout")->name('about');
Route::get('/contact', "PagesController@getContact")->name('contact');
Route::get('/test', "PagesController@getTest");

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/profile', 'UserController@profile');
    Route::post('/profile', 'UserController@update_avatar');
});

Route::get('/com', 'HomeController@com');

Route::resource('categories','CategoryController',['except'=>['create']]);

Route::resource("stuff",'StuffController');
//
//Route::group(['prefix' => 'stuff/'], function () {
//    Route::get("/", "StuffController@index");
//    Route::get("/create", "StuffController@create")->middleware('auth');
//    Route::post("/create", "StuffController@store")->middleware('auth');
//    Route::get("/{suff_id}", "StuffController@show");
//    Route::get("/{suff_id}/edit", "StuffController@edit")->middleware('auth');
//    Route::put("/{suff_id}/edit", "StuffController@update")->middleware('auth')->name("stuff.update");
//    Route::get("/{suff_id}/delete", "StuffController@destroy")->middleware('auth');
//});
Route::resource('tags', 'TagController', ['except' => ['create']]);