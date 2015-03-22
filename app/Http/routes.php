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
Route::resource('task3', 'TaskTwoController');
Route::resource('videos', 'VideoController');

Route::post('tickets/{id}/handled', 'TicketController@handled');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
