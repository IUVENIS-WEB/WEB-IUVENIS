<?php

namespace App\Repositories;

use App\Contracts\IPostRepository;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PostRepository extends Repository implements IPostRepository
{
        //A resposta deve estar em https://laravel.com/docs/5.3/eloquent-relationships#querying-relationship-existence
        // ou em https://laravel.com/docs/5.2/queries#where-clauses
        function getPosts($tagIdArray= [], $take = 10){
                return Post::whereHas('tags', function($q){
                        $q->where('id', '=', 2);
                })
                ->get();
        }
}
