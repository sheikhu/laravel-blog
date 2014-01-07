<?php

class TagsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('tags')->truncate();

		$tags = array(
            array(
                'name' => 'Code',
                'slug' => Str::slug('code')
                ),
            array(
                'name' => Str::slug('Agile'),
                'slug' => Str::slug('Agile')
                )
		);

		// Uncomment the below to run the seeder
		DB::table('tags')->insert($tags);

        $this->command->info('Tags table seeded !');
	}

}
