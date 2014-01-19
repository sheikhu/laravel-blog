<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->truncate();

		$users = [
            [
                'username'   => 'admin',
                'name'       => 'Admin',
                'email'      => 'admin@gmail.com',
                'password'   =>  Hash::make('admin'),
                'created_at' => new Datetime,
                'updated_at' => new Datetime
            ],
            [
                'username' => 'sheikhu',
                'name'     => 'Sheikhu',
                'email'    => 'sheikhu02@gmail.com',
                'password' =>  Hash::make('admin'),
                'created_at' => new Datetime,
                'updated_at' => new Datetime
            ]
        ];

		// Uncomment the below to run the seeder
            DB::table('users')->insert($users);


        // $this->command->info('Users table seeded !');
	}

}
