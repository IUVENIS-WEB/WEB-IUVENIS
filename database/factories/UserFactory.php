<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'foto' => 'usuario.png',
        'adm_power' => $faker->boolean(),
        'nome' => $faker->firstName,
        'sobrenome' => $faker->lastName,
        'email' => $faker->safeEmail,
        'nascimento' => $faker->date(),
        'password' => $password ?: $password = bcrypt('Iuvenis@2022'),
        'remember_token' => str_random(10),
        'bio' => $faker->sentence()
    ];
});
