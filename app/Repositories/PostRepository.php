<?php

namespace App\Repositories;

use App\Contracts\IPostRepository;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PostRepository extends Repository implements IPostRepository
{
        function getPosts($tagIdArray= [], $take = 10){
                return Post::with(['tags' => function ($q) use($tagIdArray){
                        $q->when($tagIdArray, function ($query) use($tagIdArray){
                                $query->whereIn('tags.id', $tagIdArray);
                        });
                }])
                ->where([
                        ['excluido', '=', 0],
                        ['comentario', '=', 0],
                ])
                ->orderBy('created_at', 'desc')
                ->take($take)
                ->get();
        }
}
