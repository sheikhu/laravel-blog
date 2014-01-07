<?php

class PostsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('posts')->truncate();

		$posts = [
            [
            'title'   => 'Hello World',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'slug'    =>  Str::slug('Hello World'),
            'user_id' =>  User::first()->id,
            'category_id' => Category::whereName('Php')->first()->id
            ]
        ];

		// Uncomment the below to run the seeder
		foreach ($posts as $post) {
            $tag = DB::table('tags')->orderBy('RAND()')->first();
            $post = Post::create($post);

            $post->tags()->attach($tag->id);
        }

        $this->command->info('Posts table seeded !');
	}

}
