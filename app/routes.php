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
Route::get('portfolio', array(
    'as' => 'portfolio',
    'uses' => 'HomeController@getPortfolio')
);

Route::match(array('GET', 'POST'), 'contact', array(
    'as' => 'contact',
    'uses' => 'HomeController@getContact')
);

Route::get('/', array(
    'as' => 'home',
    'uses' => 'HomeController@index')
);

Route::get('/about', array(
    'as' => 'me',
    'uses' => 'HomeController@about')
);


Route::match(array('GET', 'POST') ,'contact', array(
    'as' => 'contact',
    'uses' => 'HomeController@contact'
    )
);

Route::match(array('GET', 'POST') ,'login', array(
    'as' => 'login',
    'uses' => 'HomeController@login')
);

Route::model('author', 'User');

Route::bind('author', function($value, $route){
    return User::where('username', $value)->firstOrFail();
});



Route::group(array('prefix' => '/', 'before' => 'auth'), function(){

    Route::resource('posts', 'PostsController');

    Route::resource('users', 'UsersController');

    Route::resource('categories', 'CategoriesController');

    Route::resource('tags', 'TagsController');

    Route::resource('photos', 'PhotosController');

    Route::resource('portfolios', 'PortfoliosController');

    Route::resource('contacts', 'ContactsController');

    Route::get('/profile', ['as' => 'profile', function(){
        return View::make('users.profile');
    }]);

    Route::get('logout', array(
        'as' => 'logout',
        'uses' => 'HomeController@logout')
    );
});


View::composer('layouts.partials.navbar', 'App\Composers\NavbarComposer');

View::composer('layouts.partials.admin_sidebar', 'App\Composers\SidebarComposer');

View::composer('layouts.partials.sidebar', 'Blog\Composers\BlogSidebarComposer');


Route::get('/test', function(){
    return View::make('temp');
});

Route::get('/ajax', function(){
    return Post::all();
});
