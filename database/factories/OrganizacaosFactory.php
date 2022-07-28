<?php

$factory->define(App\Organizacao::class, function (Faker\Generator $faker) {
    $userArray = App\User::pluck('id')->toArray();
    $orgArray = App\Organizacao::pluck('id')->toArray();
    
    return [
        'nome' => Illuminate\Support\Str::title($faker->word),
        'descricao' => $faker->sentence,
        'logo' => 'organizacao.png',
        'logo_alternativa' => 'organizacao2.png'
    ];
});
