<?php

use Illuminate\Database\Seeder;

class SalvosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Salvo::class, 50)->create();
    }
}
