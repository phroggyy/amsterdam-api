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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::resource('tickets', 'TicketController');
Route::resource('posts', 'PostsController');

Route::any('task1/committee/{committee}', ['uses' => 'TaskOneController@showCommittee', 'as' => 'task1.showcommittee']);
Route::resource('task1', 'TaskOneController');

//Route::any('task3', ['uses' => 'TaskTwoController', 'as' => 'task2.committees']);
Route::resource('task3', 'TaskTwoController');
Route::resource('videos', 'VideoController');

Route::resource('albums', 'PhotosController');	// http://api.tandem15.eu/albums to retrieve all, http://api.tandem15.eu/albums/{id} for show

Route::post('tickets/{id}/handled', 'TicketController@handled');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
