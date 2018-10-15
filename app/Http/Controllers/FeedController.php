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
        $query = 'SELECT * FROM reclamacoes;';
        $reclamacoes = DB::select($query);

        return view('feed', compact('reclamacoes'));
    }
}
