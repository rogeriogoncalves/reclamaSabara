<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FeedController extends Controller
{
    /**
     * Este Controller manipula tudo que envolve o feed principal do usuário
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function carregaFeed(Request $request)
    {
        $reclamacoes = DB::select('SELECT * FROM reclamacoes;');
        
        foreach ($reclamacoes as $reclamacao) {
            error_log($reclamacao->conteudoReclamacao);
        }
        
        
        return view('feed');
    }
}
