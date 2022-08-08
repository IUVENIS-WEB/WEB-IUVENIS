<?php

use Illuminate\Database\Seeder;

class PostViewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PostViews::class, 50)->create();
    }
}
