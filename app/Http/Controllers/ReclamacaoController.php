<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\reclamacoes;
use App\Http\Models\thumbs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReclamacaoController extends Controller
{
    
    private $cadastro, $thumbs;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(reclamacoes $cadastro, thumbs $thumbs)
    {
        $this->cadastro = $cadastro;
        $this->thumbs = $thumbs;
    }
    
    public function index()
    {
        return $this->show();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ///
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ///Pega todos os dados que vem do formulario e inclui o id do usuário logado
        $dataForm = $request->all();
        $idUsuario = Auth::user()->id;
        $dataForm = array_merge($dataForm, compact('idUsuario'));
        
        ///Valida os dados de acordo com as regras que criei na model
        ///Imprime as mensagens personalizadas de acordo com o que defini na model
        $this->validate($request, $this->cadastro->rules, $this->cadastro->messages);
        
        ///Insere no banco de dados
        $insert = $this->cadastro->create($dataForm);
        
        if($insert)
            return redirect()->action('FeedController@index');
        else 
            return redirect()->back();

    }

    /**
     * Retorna a view com o form para inserção de reclamações.
     *
     * @param  none
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view("cadastrarReclamacao");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reclamacao = $this->cadastro->find($id);
        return view('editarReclamacao', compact('reclamacao'));
    }

    /**
     * Stores a thumbs up to the entry in database
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeThumbsUp($idReclamacao,$idUsuario)
    {
        $reclamacao = $this->cadastro->find($idReclamacao);
        
        $rowsAffected = DB::table('thumbs')->select('*') 
                    ->where ('idUsuario', $idUsuario) 
                        ->where ('idReclamacao', $idReclamacao)->count();

        if($rowsAffected == 0)
        {
            DB::insert('insert into thumbs (idUsuario, idReclamacao) values (?, ?)', [$idUsuario, $idReclamacao]);
            $update = $reclamacao->update([
                'rankingMais' => $reclamacao->rankingMais+1,

            ]);
        }

        else 
        {
            DB::table('thumbs')->where('idUsuario', $idUsuario)->where('idReclamacao', $idReclamacao)->delete();
            $update = $reclamacao->update([
                'rankingMais' => $reclamacao->rankingMais-1,
            ]);
        }

        if ($update)
            return redirect()->action('FeedController@index');
        else
            return redirect()->back();
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
        $reclamacao = $this->cadastro->find($id);
        $update = $reclamacao->update([
            'conteudoReclamacao' => $request->conteudoReclamacao,
        ]);

        if ($update)
            return redirect()->action('FeedController@index');
        else
            return redirect()->back();
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
