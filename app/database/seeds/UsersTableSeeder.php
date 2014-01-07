<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->truncate();

		$users = [
            [
            'username' => 'admin',
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' =>  Hash::make('admin')
            ],
            [
            'username' => 'sheikhu',
            'name'     => 'Sheikhu',
            'email'    => 'sheikhu02@gmail.com',
            'password' =>  Hash::make('admin')
            ]
        ];

		// Uncomment the below to run the seeder
		foreach ($users as $user) {
            User::create($user);
        }

        $this->command->info('Users table seeded !');
	}

}
