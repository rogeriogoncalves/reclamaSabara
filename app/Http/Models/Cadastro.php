<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
     protected $fillable = ['reclamacao', 'usuResponsavelCadastro', 'rankingMais', 'rankingMenos', 'create_at', 'update_at'];
    ///protected $guarded = ['usuResponsavelCadastro']; 
    
        public $rules = [
            'reclamacao'   => 'required| min:3 | max:140',
            'usuResponsavelCadastro' => 'required'
        ];
        
        public $messages = [
            'reclamacao.required' => 'O campo reclamação é de preenchimento obrigatório',
            'reclamacao.min' => 'O campo reclamação deve conter no minimo 3 caracteres',
            'reclamacao.max' => 'O campo reclamação deve conter no maximo 140 caracteres'
        ];
}
