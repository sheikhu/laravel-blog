<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showPost($slug)
	{
		$post = Post::whereSlug($slug)->first();

		return View::make('blog.blog-single', compact('post'));
	}

	public function showByTag($slug)
	{
		$posts = Tag::whereSlug($slug)->first()->posts()->paginate(1);

		return View::make('home', compact('posts'));

	}

}
