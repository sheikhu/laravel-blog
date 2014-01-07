<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('TagsTableSeeder');
		$this->call('PostsTableSeeder');

		$this->command->info('Database seeded !');
	}

}
