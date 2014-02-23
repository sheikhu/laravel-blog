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

Route::match(array('GET', 'POST'), 'contact', array(
    'as' => 'contact',
    'uses' => 'HomeController@getContact')
);

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

Route::get('/about', array('as' => 'me', function(){

    return View::make('about');
}));


Route::get('/profile', ['as' => 'profile', 'before' => 'auth', function(){

    return View::make('users.profile');

}]);

Route::match(array('GET', 'POST') ,'contact', array('as' => 'contact', 'uses' => 'HomeController@contact'));

Route::match(array('GET', 'POST') ,'login', array('as' => 'login', 'uses' => 'HomeController@login'));

Route::get('logout', array('as' => 'logout', 'before' => 'auth', 'uses' => 'HomeController@logout'));

Route::model('author', 'User');

Route::bind('author', function($value, $route)
{
    return User::where('username', $value)->firstOrFail();
});



Route::group(array('prefix' => 'blog'), function(){

    Route::get('/', array('as' => 'blog.home', 'uses' => 'BlogController@index'));

    Route::get('{slug}', array('as' => 'blog.show', 'uses' =>'BlogController@showPost'));

    Route::get('tag/{tag}', array('as' => 'show_by_tag', 'uses' => 'BlogController@showByTag'));

    Route::get('category/{tag}', array('as' => 'show_by_category', 'uses' => 'BlogController@showByCategory'));

    Route::get('author/{author}', array('as' => 'show_by_author', 'uses' => 'BlogController@showAuthor'));

});



Route::group(array('prefix' => '/', 'before' => 'auth'), function(){

    Route::resource('posts', 'PostsController');

    Route::resource('users', 'UsersController');

    Route::resource('categories', 'CategoriesController');

    Route::resource('tags', 'TagsController');

    Route::resource('photos', 'PhotosController');

    Route::resource('portfolios', 'PortfoliosController');

    Route::resource('contacts', 'ContactsController');
});


View::composer('layouts.partials.navbar', 'App\Composers\NavbarComposer');


View::composer('layouts.partials.admin_sidebar', 'App\Composers\SidebarComposer');

View::composer('layouts.partials.sidebar', 'Site\Composers\BlogSidebarComposer');


Route::get('/test', function()
{
    return View::make('temp');
});


Route::get('/ajax', function(){

    return Post::all();

})
?>


