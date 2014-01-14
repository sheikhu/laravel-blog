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

	public function getIndex()
	{
		$posts = Post::paginate(1);
    	return View::make('home', ['posts' => $posts]);
	}

	public function getPortfolio()
	{
		$jobs = Portfolio::all();
		return View::make('jobs', compact('jobs'));
	}

	public function login()
	{
		if(Request::getMethod() == 'POST')
		{
			$credentials = Input::only(array('username', 'password'));
			$validator = Validator::make($credentials, User::$rules);

			if($validator->passes())
			{
				if(Auth::attempt($credentials))
				{
					return Redirect::route('posts.index')
								->with('message', 'Welcome '. Auth::user()->name);
				} else {
					return Redirect::route('login')
							->withInput()
							->withErrors($validator)
							->with('message', 'Username and/or password invalid.');
				}

			} else {
				return Redirect::route('login')
							->withInput()
							->withErrors($validator);

			}
		}

		return View::make('auth.login');
	}


	public function logout()
	{
		Auth::logout();
		return Redirect::route('home');
	}

}
