<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(OrganizacaosSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(PostTagsSeeder::class);
    }
}
