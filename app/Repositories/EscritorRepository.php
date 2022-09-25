<?php

namespace App\Repositories;

use App\Contracts\IEscritorRepository;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class EscritorRepository extends Repository implements IEscritorRepository
{
        function getEscritores($ids = [], $take = 10){
                return User::where([
                        ['organizacao_id', '!=', null],
                ])
                ->when($ids != [], function($q) use($ids){
                        return $q->whereIn('id', $ids);
                })
                ->take($take)
                ->get()
                ->all();
        }

        function getEscritor($id = null) {

                $user = DB::table('users')
                        ->join('posts', 'posts.autor_id', '=', 'users.id')
                        ->where('users.id', '=', $id)
                        ->select(DB::raw('users.foto as foto, '
                                        .'users.nome as nome, '
                                        .'users.sobrenome as sobrenome, '
                                        .'users.bio as bio, '
                                        .'users.descricao as descricao '))
                        ->get()
                        ->first();

                $post = DB::table('posts')
                ->join('users','users.id','=','posts.autor_id')
                ->join('post_tags','post_tags.post_id','=','posts.id')
                ->join('tags','tags.id','=','post_tags.tag_id')
                ->join('salvos','salvos.post_id','=','posts.id')
                ->join('colecaos','colecaos.id','=','salvos.colecao_id')
                ->where([
                        ['posts.excluido', '=', 0],
                        ['posts.comentario', '=', 0],
                        ['posts.autor_id', '=', $id],
                ])
                // ->select([
                //         'colecaos.nome',
                //         'posts.tipo',
                //         'posts.titulo',
                //         'posts.updated_at',
                //         'posts.resumo',
                //         'posts.imagem',
                //         'tags.nome',
                //         'tags.id',
                // ])
                ->select(DB::raw('colecaos.nome as colecaos_nome, ' 
                                .'colecaos.id as colecaos_id, '
                                .'posts.id as posts_id, '
                                .'posts.tipo as posts_tipo, '
                                .'posts.titulo as posts_titulo, '
                                .'posts.updated_at as posts_updated_at, '
                                .'posts.resumo as posts_resumo, '
                                .'posts.imagem as posts_imagem, '
                                .'tags.nome as tags_nome, '
                                .'tags.id as tags_id'))
                ->get()
                ->all();
                return [$post, $user];
        }
}
