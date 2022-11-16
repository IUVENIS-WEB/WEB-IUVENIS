<?php

namespace App\Repositories;

use App\Colecao;
use App\Contracts\IPostRepository;
use App\Post;
use App\PostViews;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class PostRepository extends Repository implements IPostRepository
{
        function getPosts($tagIdArray = [], $take = 10, $tipo = [])
        {
                if (!$tipo) {
                        $tipo = ['evento', 'artigo', 'video'];
                }
                $response = Post::with([
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
                        ->whereIn('tipo', $tipo)
                        ->orderBy('created_at', 'desc')
                        ->take($take)
                        ->get();
                return $response;
        }

        function getMostViewedEscritor($take = 10)
        {
                return \App\Post::withCount('views')
                ->orderBy('views_count', 'desc')
                ->take($take)
                ->get();
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
                                ->join('users', 'users.id', '=', 'posts.autor_id')
                                ->join('post_tags', 'post_tags.post_id', '=', 'posts.id')
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
                                        'posts.id',
                                        'posts.imagem',
                                        'posts.tipo',
                                        'posts.titulo',
                                        'tags.nome',
                                ])
                                ->take($take)
                                ->get()
                )->groupBy('nome');

                $response = collect([]);
                foreach ($data as $posts) {
                        $obj = new stdClass();
                        $obj->tag = $posts->all()[0]->nome;
                        $obj->posts = $posts->map(function ($item) {
                                $item->foto = request()->getSchemeAndHttpHost() . '/images/users/' . $item->foto;
                                $item->imagem = request()->getSchemeAndHttpHost() . '/images/posts/' . $item->imagem;
                                return $item;
                        })->all();

                        $response->push($obj);
                }
                return $response;
        }
        public function getComentarioPostbyIdPai($id)
        {
                return $data = DB::table('posts')
                        ->join('users', 'users.id', '=', 'posts.autor_id')
                        ->where([
                                ['posts.comentario', '=', '1'],
                                ['posts.pai_id', '=', $id]
                        ])
                        ->orderBy('posts.created_at', 'asc')
                        ->get();
        }
        public function getColecoesByUser($id)
        {
                $data = DB::table('colecaos')
                        ->where([
                                ['colecaos.creator_id', '=', $id]
                        ])
                        ->select(['colecaos.id', 'colecaos.nome', 'colecaos.updated_at'])
                        ->get()
                        ->all();
                return $data;
        }
        public function getPostByIdColecoes($id)
        {
                return $data = DB::table('salvos')
                        ->join('posts', 'posts.id', '=', 'salvos.post_id')
                        ->where([
                                ['salvos.colecao_id', '=', $id]
                        ])
                        ->get()
                        ->all();
        }

        public function getPostsUser($id, $tipo = null)
        {
                $posts = DB::table('posts')
                        ->join('users', 'users.id', '=', 'posts.autor_id')
                        ->join('organizacaos', 'organizacaos.id', '=', 'posts.organizacao_id')
                        ->where([
                                ['posts.excluido', '=', 0],
                                ['posts.tipo', '=', $tipo],
                                ['posts.comentario', '=', 0],
                                ['posts.autor_id', '=', $id->id],
                        ])
                        ->orderBy('posts.updated_at', 'asc')
                        ->select(
                                'posts.autor_id',
                                'users.foto',
                                'users.nome',
                                'users.sobrenome',
                                'posts.tipo',
                                'posts.id',
                                'posts.titulo',
                                'organizacaos.nome',
                                'posts.updated_at'
                        )
                        ->get();
                return $posts;
        }

        public function mostRecentEvent()
        {
                return Post::where([
                        ['tipo', '=', 'evento'],
                        ['excluido', '=', 0],
                        ['comentario', '=', 0],
                ])
                        ->orderBy('data_evento', 'desc')
                        ->first();
        }

        public function postViewCount($id)
        {
                return PostViews::where([['post_id', '=', $id]])->get()->count();
        }

        public function getPostsByColecao($id)
        {

                $colecao = Colecao::find($id);
                $posts = $colecao->salvos->map(function ($salvo){
                        return $salvo->post;
                });
                return [$posts, $colecao];
        }
        public function postRecomendado()
        {
                $postId = DB::table('post_views')
                        ->select(DB::raw('count(id) as \'count\', id'))
                        ->groupBy(['id', 'post_id']);
                return $postId;
        }
        public function postsDenunciados()
        {
                return Post::where([
                        ['excluido', '=', 1],
                        ['denunciasContagem', '>=', 5]
                ])
                        ->get()->all();
        }

        public function getPostsByEscritor($id)
        {
                return Post::where([
                        ['excluido', '=', 0],
                        ['autor_id', '=', $id]
                ])->get()->all();
        }
        public function getPostsByTag($tagId)
        {
                return DB::table('posts')
                        ->join('post_tags', 'post_tags.post_id', '=', 'posts.id')
                        ->where([
                                ['excluido', '=', 0],
                                ['comentario', '=', 0],
                                ['tag_id', '=', $tagId]
                        ])
                        ->get();
        }
}
