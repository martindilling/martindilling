<?php

/**
 * Home route
 */
Route::get('/', array('as' => 'home', 'uses' => 'CreationsController@index'));

/**
 * Auth routes
 */
Route::get( 'login',    array('as' => 'login',          'uses' => 'SessionsController@create'));
Route::get( 'logout',   array('as' => 'logout',         'uses' => 'SessionsController@destroy'));
Route::post('sessions', array('as' => 'sessions.store', 'uses' => 'SessionsController@store'));

/**
 * Portfolio routes
 */
Route::get('portfolio',              array('as' => 'creations.index', 'uses' => 'CreationsController@index'));
Route::get('portfolio/{id}/{slug?}', array('as' => 'creations.show',  'uses' => 'CreationsController@show'));

/**
 * Post routes
 */
Route::get('blog',              array('as' => 'posts.index', 'uses' => 'PostsController@index'));
Route::get('blog/{id}/{slug?}', array('as' => 'posts.show',  'uses' => 'PostsController@show'));

/**
 * About routes
 */
Route::get('about', array('as' => 'about', function()
{
    return View::make('about');
}));

/**
 * Contact routes
 */
Route::get('contact', array('as' => 'contact', function()
{
    return View::make('contact');
}));
