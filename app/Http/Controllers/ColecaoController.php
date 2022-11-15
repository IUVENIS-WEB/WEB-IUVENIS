<?php

namespace App\Http\Controllers;

use App\Colecao;
use App\Contracts\ISalvoRepository;
use App\Repositories\SalvoRepository;
use App\Repositories\PostRepository;
use App\Salvo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ColecaoController extends Controller
{
    public function getColecaos(ISalvoRepository $salvoRepository)
    {
        return response()->json(
            $salvoRepository->getColecoes()
        );
    }

    public function salvaPost(Request $req)
    {
        try {
            $salvo = Salvo::firstOrCreate([
                'colecao_id' => $req->colecao_id,
                'user_id' => Auth::user()->id,
                'post_id' => $req->post_id,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'data' => $e,
                'message' => 'Houve um erro e não foi possível salvar o post.'
            ]);
        }
        return response()->json(['success' => true, 'data' => $salvo]);
    }

    public function salvaColecao(Request $req){
        try {
            $colecao = Colecao::firstOrCreate([
                'creator_id' => Auth::user()->id,
                'nome' => $req->nome
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'data' => $e->getMessage(),
                'message' => 'Houve um erro e não foi possível criar a coleção.'
            ]);
        }
        return response()->json(['success' => true, 'data' => $colecao]);
    }
    public function getColecaosByUser(PostRepository $postRepository)
    {
        if(Auth::check())
        {
            $id = Auth::user()->id;
            $colecoes = $postRepository->getColecoesByUser($id);
            //dd($colecoes);
            return view('perfil.colecoes', ['colecoes'=>$colecoes]);
        }
        return view('login.index');
    }
}
