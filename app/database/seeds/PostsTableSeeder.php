<?php

class PostsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('posts')->truncate();

        $faker = Faker\Factory::create();

		$posts = [
            [
            'title'   => $faker->sentence(6),
            'content' => $faker->paragraph(8),
            'slug'    =>  Str::slug('Hello World'),
            'user_id' =>  User::first()->id,
            'category_id' => Category::whereName('Php')->first()->id,
            'created_at' => new DateTime,
            'updated_at' => new DateTime
            ]
        ];

		// Uncomment the below to run the seeder
		for ($i=0; $i < 10; $i++) {
            $tag = DB::table('tags')->orderBy('RAND()')->first();

            $post_title = $faker->sentence(6);

            $post = [
            'title'   => $post_title,
            'content' => $faker->paragraph(8),
            'slug'    =>  Str::slug($post_title),
            'user_id' =>  $faker->randomElement(User::all()->lists('id')),
            'category_id' => $faker->randomElement(Category::all()->lists('id')),
            'created_at' => $faker->dateTime,
            'updated_at' => new DateTime
            ];

            $id = DB::table('posts')->insert($post);
            Post::find($id)->tags()->sync(Tag::all()->lists('id'));
        }

        // $this->command->info('Posts table seeded !');
	}

}
