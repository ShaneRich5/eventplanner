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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('places', 'PlaceController');
Route::resource('places.events', 'PlaceEventController');
Route::resource('places.reviews', 'PlaceReviewController');
Route::resource('events.reviews', 'EventReviewController');
