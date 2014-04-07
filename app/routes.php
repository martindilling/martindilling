<?php

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


/**
 * Post routes
 */
Route::get('blog',              array('as' => 'posts.index', 'uses' => 'PostsController@index'));
Route::get('blog/{id}/{slug?}', array('as' => 'posts.show',  'uses' => 'PostsController@show'));
