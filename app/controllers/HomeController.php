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

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf', array('on' => 'post'));
	}

	public function showWelcome()
	{
		// return View::make('hello');

		$this->flashes->add('success', 'Flash test');

		return Redirect::route('home')->with('messages' , $this->flashes);
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

	public function contact()
	{
		if(Request::getMethod() == 'GET')
			return View::make('contact');

		// Post request

	}

	public function login()
	{

		if(Request::getMethod() == 'GET')
			return View::make('auth.login');



			$credentials = Input::only(array('email', 'password'));
			$validator = Validator::make($credentials, User::$loginRules);

			if($validator->passes())
			{
				if(Auth::attempt($credentials))
				{
					$this->flashes->add('success', 'Welcome ' . Auth::user()->name);
					return Redirect::route('posts.index')
								->with('messages', $this->flashes);
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


	public function logout()
	{
		Auth::logout();

		return Redirect::route('home');
	}

}
