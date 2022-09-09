<?php

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    $userArray = App\User::pluck('id')->toArray();
    $orgArray = App\Organizacao::pluck('id')->toArray();
    
    return [
        'titulo' => Illuminate\Support\Str::title($faker->word),
        'resumo' => $faker->sentence,
        'tipo' => $faker->randomElement(['evento', 'video', 'artigo']),
        'excluido' => false,
        'imagem' => url()->to('/').':8000/storage/images/posts/post.png',
        'autor_id' => $faker->randomElement($userArray),
        'organizacao_id' => $faker->randomElement($orgArray),
        'data_evento' => $faker->date(),
        'link_evento' => 'https://calendar.google.com/event?action=TEMPLATE&tmeid=MmFvbTkyaWxuMGh0bG80bjFrMG5jZWNvbDYganYuZHVxdWVAdW5lc3AuYnI&tmsrc=jv.duque%40unesp.br'
    ];
});
