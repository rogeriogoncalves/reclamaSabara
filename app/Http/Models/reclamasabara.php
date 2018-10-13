<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class reclamasabara extends Model
{
     protected $fillable = ['conteudoReclamacao', 'nomeUsuario', 'rankingMais', 'rankingMenos', 'create_at', 'update_at'];
    // protected $guarded = ['idUsuario']; 
    
        public $rules = [
            'conteudoReclamacao'   => 'required| min:3 | max:140',
            ///'usuResponsavelCadastro' => 'required'
        ];
        
        public $messages = [
            'conteudoReclamacao.required' => 'O campo reclamação é de preenchimento obrigatório',
            'conteudoReclamacao.min' => 'O campo reclamação deve conter no minimo 3 caracteres',
            'conteudoReclamacao.max' => 'O campo reclamação deve conter no maximo 140 caracteres'
        ];

        protected $table = "reclamacoes";
}