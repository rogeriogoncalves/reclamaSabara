<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadastroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('conteudoReclamacao',140);
            $table->string('categoria');
            $table->integer('rankingMais')->nullable(); 
            $table->integer('rankingMenos')->nullable();
            $table->unsignedinteger('idUsuario');
            $table->timestamps();
            $table->foreign('idUsuario')->references('id')->on('users')->onDelete('cascade');
            
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        ///Schema::dropIfExists('reclamasabara');
    }
}
