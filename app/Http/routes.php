<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
   
	Route::get('/', 'CalendarController@todayView');
	Route::get('date', 'CalendarController@todayView');

	Route::get('date/{year}', 'CalendarController@yearView');
	Route::get('date/{year}/{month}', 'CalendarController@monthView');
	Route::get('date/{year}/{month}/{day}', 'CalendarController@weekView');
	Route::get('date/{year}/{month}/{day}/day', 'CalendarController@dayView');

	Route::get('event', 'EventController@listView');

	Route::get('event/list', 'EventController@listView');
	Route::get('event/create', 'EventController@createView');
	Route::get('event/get/{id}', 'EventController@getView');
	Route::post('event/store', 'EventController@store');

	//Route::delete('event/delete/{id}', 'EventController@delete');


});
