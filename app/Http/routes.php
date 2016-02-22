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

	Route::get('todo', 'TodoController@createPoolView');

	Route::get('todo/pool', 'TodoController@createPoolView');
	//Route::get('todo/pool/list', 'TodoController@createPoolView');
	Route::get('todo/pool/create', 'TodoController@createPoolView');
	//Route::get('todo/pool/get/{id}', 'TodoController@createPoolView');
	//Route::post('todo/pool/store', 'EventController@store');
	//Route::delete('todo/pool/delete/{id}', 'EventController@delete');

	//Route::get('todo/poolwindow/list', 'TodoController@createPoolView');
	Route::get('todo/poolwindow/create', 'TodoController@createPoolWindowView');
	//Route::get('todo/poolwindow/get/{id}', 'TodoController@createPoolView');
	//Route::post('todo/poolwindow/store', 'EventController@store');
	//Route::delete('todo/poolwindow/delete/{id}', 'EventController@delete');

	//Route::get('todo/list', 'TodoController@createPoolView');
	//Route::get('todo/create', 'TodoController@createPoolView');
	//Route::get('todo/get/{id}', 'TodoController@createPoolView');
	//Route::post('todo/store', 'EventController@store');
	//Route::delete('todo/delete/{id}', 'EventController@delete');


});
