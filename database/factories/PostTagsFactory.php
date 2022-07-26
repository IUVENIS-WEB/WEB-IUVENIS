<?php

$factory->define(App\PostTags::class, function (Faker\Generator $faker) {
    $postArray = App\Post::pluck('id')->toArray();
    $tagArray = App\Tag::pluck('id')->toArray();
    
    return [
        'post_id' => $faker->randomElement($postArray),
        'tag_id' => $faker->randomElement($tagArray)
    ];
});