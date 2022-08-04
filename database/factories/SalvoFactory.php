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

$factory->define(App\Salvo::class, function (Faker\Generator $faker) {
    $postArray = App\Post::pluck('id')->toArray();
    $userArray = App\User::pluck('id')->toArray();
    $colecaoArray = App\Colecao::pluck('id')->toArray();
    return [
        'post_id' => $faker->randomElement($postArray),
        'user_id' => $faker->randomElement($userArray),
        'colecao_id' => $faker->randomElement($colecaoArray),
    ];
});
