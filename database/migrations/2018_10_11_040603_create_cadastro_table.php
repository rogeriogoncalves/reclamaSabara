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
        Schema::create('reclamasabaras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reclamacao',140);
            $table->integer('rankingMais')->nullable(); 
            $table->integer('rankingMenos')->nullable();
            $table->string('user',120)->nullable();
            $table->timestamps();
            
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
