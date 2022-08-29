<?php

namespace App\Repositories;

use App\Contracts\IPostRepository;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class PostRepository extends Repository implements IPostRepository
{
        function getPosts($tagIdArray = [], $take = 10)
        {
                return Post::with([
                        'tags' => function ($q) use ($tagIdArray) {
                                $q->when($tagIdArray, function ($query) use ($tagIdArray) {
                                        $query->whereIn('tags.id', $tagIdArray);
                                });
                        },
                        'autor'
                ])
                        ->where([
                                ['excluido', '=', 0],
                                ['comentario', '=', 0],
                        ])
                        ->orderBy('created_at', 'desc')
                        ->take($take)
                        ->get();
        }

        function getMostViewedEscritor($take = 10)
        {
                return DB::table('users')
                        ->select(DB::raw('count(post_views.post_id) as count,
                 users.foto, users.nome, users.sobrenome, users.bio, users.id'))
                        ->join('posts', 'users.id', '=', 'posts.autor_id')
                        ->join('post_views', 'posts.id', '=', 'post_views.post_id')
                        ->orderBy('count', 'desc')
                        ->groupBy([
                                'post_views.post_id',
                                'users.foto',
                                'users.nome',
                                'users.sobrenome',
                                'users.bio',
                                'users.id'
                        ])
                        ->take($take)
                        ->get()->all();
        }

        function getLastSavedPosts($userId, $take = 4)
        {
                return DB::table('posts')
                        ->join('users', 'users.id', '=', 'posts.autor_id')
                        ->join('salvos', 'salvos.post_id', '=', 'posts.id')
                        ->where([
                                ['posts.excluido', '=', 0],
                                ['posts.comentario', '=', 0],
                                ['users.id', '=', $userId]
                        ])
                        ->orderBy('salvos.created_at', 'desc')
                        ->select([
                                'posts.autor_id',
                                'salvos.post_id',
                                'users.foto',
                                'users.nome',
                                'users.sobrenome',
                                'posts.tipo',
                                'posts.titulo',
                                'posts.updated_at'
                        ])
                        ->take($take)
                        ->get();
        }

        public function groupedPostsByTag($tipo = null, $take = 10)
        {
                //Obter os dados
                $data = collect(
                        DB::table('posts')
                                ->join('post_tags', 'post_tags.post_id', '=', 'posts.id')
                                ->join('users', 'users.id', '=', 'posts.autor_id')
                                ->join('tags', 'post_tags.tag_id', '=', 'tags.id')
                                ->where([
                                        ['posts.excluido', '=', 0],
                                        ['posts.comentario', '=', 0],
                                ])
                                ->orderBy('posts.created_at', 'desc')
                                ->select([
                                        'posts.autor_id',
                                        'users.foto',
                                        'users.nome',
                                        'users.sobrenome',
                                        'posts.tipo',
                                        'posts.titulo',
                                        'tags.nome'
                                ])
                                ->take($take)
                                ->get()
                )->groupBy('nome');

                $response = new stdClass();
                $response->data = collect([]);
                foreach($data as $posts){
                        $obj = new stdClass();
                        $obj->tag = $posts->all()[0]->nome;
                        $obj->posts = $posts->all();
                        $response->data->push($obj);
                }
                return $response;
        }
        public function getComentarioPostbyIdPai($id){
                return $data =DB::table('posts')
                         ->join('users', 'users.id', '=', 'posts.autor_id')
                         ->where([
                                 ['posts.comentario','=','1'],
                                 ['posts.pai_id','=',$id]
                         ])
                         ->orderBy('posts.created_at', 'asc')
                        ->get();
         }
         public function getColecoesByUser($id){
                $data = DB::table('colecaos')
                        ->where([
                                ['colecaos.creator_id','=',$id]
                        ])
                        ->select(['colecaos.id', 'colecaos.nome'])
                       ->get()
                       ->all();
                return $data;
        }
        public function getPostByIdColecoes($id){
               return $data = DB::table('salvos')       
                        ->join('posts','posts.id','=','salvos.post_id')
                        ->where([
                                ['salvos.colecao_id','=',$id]
                        ])
                        ->get()
                        ->all();
                
        }
}