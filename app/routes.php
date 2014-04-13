<?php

/**
 * Home route
 */
Route::get('/', array('as' => 'home', 'uses' => 'CreationsController@index'));


/**
 * Auth routes
 */
Route::get( 'login',    array('as' => 'login',          'uses' => 'SessionsController@create'))->before('guest');
Route::get( 'logout',   array('as' => 'logout',         'uses' => 'SessionsController@destroy'))->before('auth');
Route::post('sessions', array('as' => 'sessions.store', 'uses' => 'SessionsController@store'))->before('guest');


/**
 * Portfolio routes
 */
Route::group(array('before' => 'access:creations'), function()
{
    Route::get(   'portfolio/create',       array('as' => 'creations.create',  'uses' => 'CreationsController@create'));
    Route::post(  'portfolio',              array('as' => 'creations.store',   'uses' => 'CreationsController@store'));
    Route::get(   'portfolio/{id}/edit',    array('as' => 'creations.edit',    'uses' => 'CreationsController@edit'));
    Route::post(  'portfolio/{id}',         array('as' => 'creations.update',  'uses' => 'CreationsController@update'));
    Route::delete('portfolio/{id}',         array('as' => 'creations.destroy', 'uses' => 'CreationsController@destroy'));
});
Route::get(   'portfolio',              array('as' => 'creations.index',   'uses' => 'CreationsController@index'));
Route::get(   'portfolio/{id}-{slug?}', array('as' => 'creations.show',    'uses' => 'CreationsController@show'));


/**
 * Post routes
 */
Route::group(array('before' => 'access:posts'), function()
{
    Route::get(   'blog/create',       array('as' => 'posts.create',  'uses' => 'PostsController@create'));
    Route::post(  'blog',              array('as' => 'posts.store',   'uses' => 'PostsController@store'));
    Route::get(   'blog/{id}/edit',    array('as' => 'posts.edit',    'uses' => 'PostsController@edit'));
    Route::post(  'blog/{id}',         array('as' => 'posts.update',  'uses' => 'PostsController@update'));
    Route::delete('blog/{id}',         array('as' => 'posts.destroy', 'uses' => 'PostsController@destroy'));
});
Route::get(   'blog',              array('as' => 'posts.index',   'uses' => 'PostsController@index'));
Route::get(   'blog/{id}-{slug?}', array('as' => 'posts.show',    'uses' => 'PostsController@show'));

/**
 * About routes
 */
Route::get('about', array('as' => 'about.show', function()
{
    return View::make('about.show');
}));

/**
 * Contact routes
 */
Route::get( 'contact', array('as' => 'contact.show',     'uses' => 'ContactController@showPage'));
Route::post('contact', array('as' => 'contact.sendmail', 'uses' => 'ContactController@sendmail'));

