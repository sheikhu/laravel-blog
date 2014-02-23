<?php

class BaseController extends Controller {

	protected $flashes;

	public function __construct()
	{
		$this->flashes = new Illuminate\Support\MessageBag();
	}
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
