<?php

class PortfoliosController extends BaseController {

	/**
	 * Portfolio Repository
	 *
	 * @var Portfolio
	 */
	protected $portfolio;

	public function __construct(Portfolio $portfolio)
	{
		$this->portfolio = $portfolio;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$portfolios = $this->portfolio->all();

		return View::make('portfolios.index', compact('portfolios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('portfolios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Portfolio::$rules);

		if ($validation->passes())
		{
			$this->portfolio->create($input);

			return Redirect::route('portfolios.index');
		}

		return Redirect::route('portfolios.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$portfolio = $this->portfolio->findOrFail($id);

		return View::make('portfolios.show', compact('portfolio'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$portfolio = $this->portfolio->find($id);

		if (is_null($portfolio))
		{
			return Redirect::route('portfolios.index');
		}

		return View::make('portfolios.edit', compact('portfolio'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Portfolio::$rules);

		if ($validation->passes())
		{
			$portfolio = $this->portfolio->find($id);
			$portfolio->update($input);

			return Redirect::route('portfolios.show', $id);
		}

		return Redirect::route('portfolios.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->portfolio->find($id)->delete();

		return Redirect::route('portfolios.index');
	}

}
