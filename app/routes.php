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

Route::get('/test', function(){

    return Image::all();
});
Route::get('/', array('as' => 'home', function()
{
    $posts = Post::paginate(1);
    return View::make('home', ['posts' => $posts]);
}));

Route::get('/me', array('as' => 'me', function(){

    return View::make('about');
}));

Route::resource('posts', 'PostsController');

Route::resource('users', 'UsersController');

Route::resource('categories', 'CategoriesController');

Route::resource('tags', 'TagsController');

Route::resource('photos', 'PhotosController');


Route::group(array('prefix' => 'blog'), function(){

    Route::get('{slug}', 'HomeController@showPost');

    Route::get('tag/{tag}', 'HomeController@showByTag');


});
?>
