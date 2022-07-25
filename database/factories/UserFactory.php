<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'adm_power' => $faker->boolean,
        'nome' => $faker->name,
        'sobrenome' => $faker->lastName,
        'bio' => $faker->sentence,
        'nascimento' => $faker->date(),
        'email' => $faker->email,
        'password' => Hash::make('iuvenis@2022')
    ];
});
