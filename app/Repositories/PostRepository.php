<?php

namespace App\Repositories;

use App\Colecao;
use App\Contracts\IPostRepository;
use App\Post;
use App\PostViews;
use App\classes\responsemessage;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use stdClass;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Repositories\ApiTokens;


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
                $escritores = \App\Post::withCount('views')
                ->join('users', 'users.id', '=', 'posts.autor_id')               
                ->where('users.organizacao_id', '!=', null)
                ->orderBy('views_count', 'desc')
                ->take(10)
                ->get();

                $escritores->toArray();

                $comparador1 =$escritores;
                $comparador2 = $escritores;
                $i=0;$j=0;
                $ta=count($comparador1);
                $manho=count($comparador2);
                while($i < $ta)
                {
                        $j=0;
                        if(isset($comparador1[$i]))
                        {
                                while($j < $manho)
                                {
                                        if(isset($comparador2[$j]))
                                        {
                                                if(($comparador1[$i]['titulo'] != $comparador2[$j]['titulo']) && ($comparador1[$i]['autor_id'] == $comparador2[$j]['autor_id']))
                                                {
                                                        foreach($comparador1 as $comp)
                                                        {
                                                                if($comp == $comparador2[$j])
                                                                {
                                                                        unset($comp);
                                                                }
                                                        }
                                                        unset($comparador2[$j]);
                                                }  
                                        }
                                        $j++;
                                }
                        }
                        $i++;
                }
        return $comparador1;
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
                        ->select(DB::raw('count(post_id) as \'count\', post_id'))
                        ->groupBy(['post_id'])
                        ->orderBy('count', 'desc')
                        ->get()
                        ->first();
                return DB::table('posts')
                ->select(DB::raw('posts.id, posts.titulo, posts.imagem'))
                ->where('id', '=', $postId->post_id)
                ->get()->first() 
                
                ?? DB::table('posts')
                ->select(DB::raw('posts.id, posts.titulo, posts.imagem'))
                ->get()->first();       
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

        public function postsWithTags()
        {
                return DB::table('posts')
                ->leftJoin('post_tags', 'posts.id', '=', 'post_tags.post_id')
                ->leftJoin('tags', 'post_tags.tag_id', '=', 'tags.id')
                ->select(DB::raw('posts.*, tags.nome as tag'))
                ->distinct()
                ->get();
        }
        public function getPostsByName($nome,$tagIdArray = [],$tipo = [])
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
                ->where('titulo','like','%'.$nome.'%')
                ->whereIn('tipo', $tipo)
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();
                return $response;
        }

        public function logado($user, $senha)
        {
               
                $logar = DB::table('users')
                           ->where([
                                       ['email', '=', $user]
                           ])
                           ->select([
                                   'id',
                                   'email',
                                   'password'
                           ])
                           ->first();
                if($logar ==null)
                {
                       $mensagem = new responseMessage;
                       $mensagem->message(false, 'email', null);
                       return $mensagem;
                }
                $codsenha = Hash::check($senha, $logar->password);
                if($codsenha == false)
                {
                        $mensagem = new responseMessage;
                        $mensagem->message(false, 'senha', null);
                       return $mensagem;

                }

                $data = Carbon::now();
                $dataExpiracao = Carbon::now()->addDay(30);
                
                $token_gerado = str_random(60);
                
                $token = DB::table('api_tokens')
                            ->where([
                                    ['user_id', '=', $logar->id]
                            ])
                            ->select([
                                    'token',
                                    'id'
                            ])
                            ->first();

                if($token != null)
                {
                        DB::table('api_tokens')
                            ->where([
                                    ['user_id', '=', $logar->id]
                            ])
                            ->delete();
                }
  

                DB::table('api_tokens')
                        ->insert([
                        'created_at' => $data,
                        'updated_at' => $data,
                        'user_id' => $logar->id,
                        'token' => $token_gerado,
                        'data_expiracao' => $dataExpiracao
                        
                ]);

                $token = DB::table('api_tokens')
                            ->where([
                                    ['user_id', '=', $logar->id]
                            ])
                            ->select([
                                    'token'
                            ])
                            ->first();
                
                $mensagem = new responseMessage;
                $mensagem->message(true, null, $token->token);
                return $mensagem;  
        }
}
