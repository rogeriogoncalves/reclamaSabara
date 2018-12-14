<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\reclamacoes;
use Illuminate\Support\Facades\DB;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reclamacoes = DB::table('users')->join('reclamacoes', 'users.id', '=', 'reclamacoes.idUsuario')
            ->where('reclamacoes.flag', '=', 0)
            ->orderBy('rankingMais', 'DESC')
            ->select( 'reclamacoes.*', 'users.name', 'users.photo', 'rankingMais','rankingMenos')->get();

        return view('feed', compact('reclamacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
