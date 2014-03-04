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
		return View::make('hello');
	}

	public function index()
	{
		$posts = Post::paginate(Config::get('settings.posts_per_page', 1));
		return View::make('home', ['posts' => $posts]);
	}

    public function about()
    {
        return View::make('about');
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

		$data = Input::only(array('name', 'email', 'message'));

		$contact = new Contact($data);

		if($contact->save())
		{
			return Redirect::route('home')->with('message', 'Message sent.');
		}

		return Redirect::route('contact')->withInput()
						->withErrors($contact->errors)
						->with('message', 'There were validation errors.');


		// Post request

	}

	public function login()
	{

		if(Request::getMethod() == 'GET')
			return View::make('auth.login');


		$credentials = Input::only(array(Config::get('auth.login_field', 'username'), 'password'));

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
