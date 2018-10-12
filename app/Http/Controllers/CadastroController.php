<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\reclamasabara;

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
    
    public function construct()
    {
        $this->middleware('auth');
        //$this->reclamacao = reclamacao;
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
        return view ('cadastro');
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
        
        //dd = Dump and Die, uso ele como debugger, ele pega as informações do meu formulario e mostra na tela
        ///dd($dataForm);
        
                /*///Pega data no momento da inserção EX: 09/10/2018 15:26:30
        date_default_timezone_set('America/Sao_Paulo');
        $request->create_at = date('d/m/Y H:i:s', time());
        $request->update_at = $request->create_at; */
        
        ///Validação dos dados do formulario 
        $this->validate($request, $this->cadastro->rules, $this->cadastro->messages);
        
        $insert = $this->cadastro->create($dataForm);
        
        if($insert)
            return redirect()->route('index');
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
