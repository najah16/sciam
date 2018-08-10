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


Route::get('/index','IndexController@show')->name('index');
// route for visitor register
Route::get('/visites','creer_visiteController@show')->name('visites');
Route::get('/visite_search','creer_visiteController@search')->name('visite_search');
Route::get('/hote_search','creer_visiteController@hote')->name('hote_search');
Route::post('/visites','creer_visiteController@store')->name('enregistrer_visite');
// visite not validated route 
Route::get('/sortir_visite','VisiteController@show')->name('visite_list');
Route::get('/search','VisiteController@search_ajax')->name('search_ajax');
Route::get('/sortir_visite/{id}','VisiteController@valider_ajax')->name('valider_ajax');
Route::post('/sortir_visite','VisiteController@modifier')->name('modifier');
// route of visite of the day 
Route::get('/visite_of_day','VisiteOfDayController@show')->name('visite_of_day');
Route::get('/visite_of_day/{id}','VisiteOfDayController@detail')->name('visite_of_day_details');
Route::get('/visite_of_day_search','VisiteOfDayController@search_ajax')->name('visits_of_day_ajax');
// all visits route 
Route::get('/all_visits','All_visitsController@show')->name('all_visits');
Route::get('/all_visits/{id}','All_visitsController@detail')->name('all_visits_details');
Route::get('/all_visits_search','All_visitsController@search')->name('all_visits_search');
Route::post('/all_visits','All_visitsController@date_search')->name('date_search');
//  charts route 
Route::get('/statistics','statController@show')->name('statistics');
//*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
