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
        Schema::create('Cadastro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('classe',50);
            $table->integer('rankingMais'); 
            $table->integer('rankingMenos');
            $table->string('user',120);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        ///Schema::dropIfExists('Cadastro');
    }
}
