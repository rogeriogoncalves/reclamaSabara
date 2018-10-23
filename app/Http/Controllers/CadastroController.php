<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\reclamacoes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CadastroController extends Controller
{
    
    private $cadastro;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(reclamacoes $cadastro)
    {
        $this->cadastro = $cadastro;
    }
    
    public function index()
    {
        return view('home');
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
        $nomeUsuario = Auth::user()->name;
        $dataForm = array_merge($dataForm, compact('nomeUsuario'));
        
        ///Valida os dados de acordo com as regras que criei na model
        ///Imprime as mensagens personalizadas de acordo com o que defini na model
        $this->validate($request, $this->cadastro->rules, $this->cadastro->messages);
        
        ///Insere no banco de dados
        $insert = $this->cadastro->create($dataForm);
        
        if($insert)
            return redirect()->route('feed','/');
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
