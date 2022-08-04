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

$factory->define(App\PostViews::class, function (Faker\Generator $faker) {
    $postArray = App\Post::pluck('id')->toArray();
    $userArray = App\User::pluck('id')->toArray();
    return [
        'url' => $faker->url,
        'session_id' => $faker->ipv4,
        'ip' => $faker->ipv4,
        'agent' => $faker->userAgent,
        'post_id' => $faker->randomElement($postArray),
        'user_id' => $faker->randomElement($userArray),
    ];
});
