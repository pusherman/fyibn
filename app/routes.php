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

Route::get('login', array(
    'as' => 'login',
    'uses' => 'AuthController@showLogin',
));

Route::post('login', array(
    'as' => 'login',
    'uses' => 'AuthController@postLogin',
));

Route::group(array('before' => 'auth'), function()
{
    Route::get('/', array(
        'as' => 'posts',
        'uses' => 'PostController@showIndex'
    ));

    Route::get('logout', array(
        'as' => 'logout',
        'uses' => 'AuthController@logout'
    ));

    Route::get('post', array(
        'as' => 'post',
        'uses' => 'PostController@showCreate'
    ));

    Route::post('post', array(
        'as' => 'createPost',
        'uses' => 'PostController@create'
    ));

    Route::post('post/comment/{postId}', array(
        'as' => 'createComment',
        'uses' => 'CommentController@create',
    ));

    Route::get('post/view/{postId}', array(
        'as' => 'postView',
        'uses' => 'PostController@view'
    ));

    Route::get('inbox', array(
        'as' => 'inbox',
        'uses' => 'MessageController@index'
    ));

    Route::post('post/toggle-favorite/{postId}', array(
        'as' => 'postToggleFavorite',
        'uses' => 'PostController@toggleFavorite'
    ));

    Route::get('search/all', array(
        'as' =>'search',
        'uses' => 'SearchController@find'
    ));
});

