<?php

$factory->define(App\Organizacao::class, function (Faker\Generator $faker) {
    return [
        'nome' => Illuminate\Support\Str::title($faker->word),
        'descricao' => $faker->sentence
    ];
});