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
Route::get('portfolio', array('as' => 'portfolio', 'uses' => 'HomeController@getPortfolio'));

Route::match(array('GET', 'POST', 'PUT'), 'contact', array('as' => 'contact', 'uses' => 'HomeController@getContact'));

Route::get('/test', array('as' => 'test', function(){
    return User::all();
}));

Route::get('/', array('as' => 'home', function()
{
    $posts = Post::paginate(1);
    return View::make('home', ['posts' => $posts]);
}));

Route::get('/me', array('as' => 'me', function(){

    return View::make('about');
}));

Route::get('/contact', array('as' => 'contact', function(){

    return View::make('contact');
}));

Route::match(array('GET', 'POST') ,'login', array('as' => 'login', 'uses' => 'HomeController@login'));

Route::get('logout', array('as' => 'logout', 'before' => 'auth', 'uses' => 'HomeController@logout'));

Route::group(array('prefix' => 'blog'), function(){

    Route::get('/', array('as' => 'blog.home', 'uses' => 'BlogController@index'));

    Route::get('{slug}', array('as' => 'blog.show', 'uses' =>'BlogController@showPost'));

    Route::get('tag/{tag}', array('as' => 'show_by_tag', 'uses' => 'BlogController@showByTag'));

    Route::get('category/{tag}', array('as' => 'show_by_category', 'uses' => 'BlogController@showByCategory'));

});

Route::group(array('prefix' => '/', 'before' => 'auth'), function(){

Route::resource('posts', 'PostsController');

Route::resource('users', 'UsersController');

Route::resource('categories', 'CategoriesController');

Route::resource('tags', 'TagsController');

Route::resource('photos', 'PhotosController');

Route::resource('portfolios', 'PortfoliosController');
});


View::composer('layouts.partials.navbar', 'App\Composers\NavbarComposer');



View::composer('layouts.partials.admin_sidebar', 'App\Composers\SidebarComposer');
?>


