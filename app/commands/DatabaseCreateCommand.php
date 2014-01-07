<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class DatabaseCreateCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'db:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create the database.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$availableConnections = array_keys(Config::get('database.connections'));

		$connection = $this->argument('connection');


		if(!in_array($connection, $availableConnections))
			$this->error("Connection '$connection' Not Exists");


		$this->createDatabase($connection);


		echo $connection . PHP_EOL;
	}

	/**
	 *
	 */
	private function createDatabase($connection)
	{

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('connection', InputArgument::OPTIONAL, 'Connection name.', Config::get('database.default')),
			);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
			);
	}

}
