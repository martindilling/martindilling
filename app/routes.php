<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

/**
 * Home route
 */
Route::get('/', array('as' => 'home', function()
{
    return View::make('hello');
}));


/**
 * Auth routes
 */
Route::get( 'login',    array('as' => 'login',          'uses' => 'SessionsController@create'));
Route::get( 'logout',   array('as' => 'logout',         'uses' => 'SessionsController@destroy'));
Route::post('sessions', array('as' => 'sessions.store', 'uses' => 'SessionsController@store'));
