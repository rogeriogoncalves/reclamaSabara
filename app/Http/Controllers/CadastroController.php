<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\reclamasabara;
use Illuminate\Support\Facades\DB;

class CadastroController extends Controller
{
    
    private $cadastro;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(reclamasabara $cadastro)
    {
        $this->cadastro = $cadastro;
    }
    
    public function index()
    {
        return view('home');
    }
    
    function cadastrareclamacao()
    {
        return view("cadastrareclamacao");
    }
    
    function listarcadastro(reclamasabara $cadastro)
    {
        $reclamacoes = DB::select('SELECT * FROM reclamacoes;');
        // $relatorios = $cadastro->all();
        return view("listarCadastro", compact('reclamacoes'));
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
        ///Pega todos os dados que vem do formulario
        $dataForm = $request->all();
        
        ///dd($dataForm);
        
        ///Valida os dados de acordo com as regras que criei na model
        ///Imprime as mensagens personalizadas de acordo com o que defini na model
        $this->validate($request, $this->cadastro->rules, $this->cadastro->messages);
        
        ///Insere no banco de dados
        $insert = $this->cadastro->create($dataForm);
        
        if($insert)
            return redirect()->route('listarcadastro');
        else 
            return redirect()->back();

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
