<?php

use Illuminate\Database\Seeder;

class ColecaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Colecao::class, 2)->create();
    }
}
