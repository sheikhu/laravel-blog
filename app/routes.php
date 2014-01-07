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

Route::get('/test', function()
{
    return App::environment();
});

Route::get('/', array('as' => 'home', function()
{
    return View::make('home', ['posts' => Post::all()]);
}));

Route::get('/me', array('as' => 'me', function(){

    return View::make('about');
}));

Route::post('/', ['as' => 'send_mail', function()
{
  Mail::queue('emails.welcome', ['username' => Input::get('username','Sheikhu')], function($message) {
    $message->to('sheikhu02@gmail.com', 'Sheikhu')->subject('Welcome to the Laravel 4 Auth App!');
});

  return Redirect::to('/welcome')->with('message', 'Message envoyé avec succès !.');
}]);


Route::resource('posts', 'PostsController');


Route::resource('users', 'UsersController');
