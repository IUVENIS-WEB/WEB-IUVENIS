<?php

use Illuminate\Database\Seeder;

class PostTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PostTags::class, 40)->create();
    }
}
