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

Route::get('testing', function() {
    return View::make('post.test');   
});

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
    
    Route::post('post/{postId}/comment', array(
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
    
});

