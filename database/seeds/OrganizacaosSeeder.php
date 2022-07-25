<?php

use Illuminate\Database\Seeder;

class OrganizacaosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Organizacao::class, 20)->create();
    }
}
