<?php

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    $userArray = App\User::pluck('id')->toArray();
    $orgArray = App\Organizacao::pluck('id')->toArray();

    return [
        'titulo' => Illuminate\Support\Str::title($faker->word),
        'resumo' => $faker->sentence,
        'tipo' => $faker->randomElement(['evento', 'video', 'artigo']),
        'excluido' => false,
        'user_id' => $faker->randomElement($userArray),
        'organizacao_id' => $faker->randomElement($orgArray)
    ];
});