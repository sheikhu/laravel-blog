<?php

class TagsTableSeeder extends Seeder {

    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('taggables')->truncate();
        DB::table('tags')->truncate();

        $tags = [
        [
            'name' => 'Code',
            'slug' =>  Str::slug('Code'),
        ],
        [
            'name' => 'Agile',
            'slug' => Str::slug('Agile'),
        ],
        array('name' => 'Framework', 'slug' => Str::slug('Framework'))
        ];

        // Uncomment the below to run the seeder
        foreach ($tags as $tag) {
            Tag::create($tag);
        }

        // $this->command->info('Tags table seeded !');
    }

}
