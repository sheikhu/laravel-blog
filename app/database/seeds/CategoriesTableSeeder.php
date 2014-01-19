<?php

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('categories')->truncate();

        $categories = [
        [
            'name' => 'Php',
            'slug' =>  Str::slug('Php'),
        ],
        [
            'name' => 'Laravel 4',
            'slug' => Str::slug('Laravel 4'),
        ]
        ];

        // Uncomment the below to run the seeder
        foreach ($categories as $category) {
            Category::create($category);
        }

        // $this->command->info('Categories table seeded !');
    }

}
