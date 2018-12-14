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



Auth::routes();
Route::get('/', ['uses'=>'HomeController@index','as'=>'home']);
Route::get('/home', ['uses'=>'HomeController@index','as'=>'home']);
Route::get('/restaurants', ['uses'=>'RestaurantController@index','as'=>'restaurants']);
Route::get('/restaurantdetail/{id?}', ['uses'=>'RestaurantController@detail']);
Route::get('/myreviews',['uses'=>'MyReviewsController@index', 'as'=>'myreviews']);
Route::resource('profile','ProfileController');
Route::resource('review','ReviewController');
Route::get('/adminpanel',['uses'=>'AdminController@index','as'=>'adminpanel']);
Route::get('/userpanel',['uses'=>'AdminController@userpanel','as'=>'userpanel']);
Route::get('/addrestaurant',['uses'=>'AdminController@addrestaurant','as'=>'addrestaurant']);
Route::get('/promote/{id?}', ['uses'=>'AdminController@promote']);
Route::get('/demote/{id?}', ['uses'=>'AdminController@demote']);
Route::post('/add',['uses'=>'RestaurantController@add','as'=>'add']);

Route::get('/editrest/{id}', ['uses'=>'RestaurantController@editrest','as'=>'editrest']);
Route::get('/additem/{id}', ['uses'=>'RestaurantController@additem','as'=>'additem']);
Route::get('/addhour/{id}', ['uses'=>'RestaurantController@addhour','as'=>'addhour']);
Route::post('/addtomenu', ['uses'=>'RestaurantController@addtomenu','as'=>'addtomenu']);
Route::post('/edit', ['uses'=>'RestaurantController@edit','as'=>'edit']);
Route::post('/hour', ['uses'=>'RestaurantController@hour','as'=>'hour']);