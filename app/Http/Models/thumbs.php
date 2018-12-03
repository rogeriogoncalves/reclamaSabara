<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class thumbs extends Model
{
    protected $fillable = ['id', 'idUsuario', 'idReclamacao', 'create_at', 'update_at'];
    // protected $guarded = ['idUsuario']; 

        protected $table = "thumbs";
}
