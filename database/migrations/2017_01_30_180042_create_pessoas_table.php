<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('tipo_pessoa', 10);
            $table->string('nome', 100);
            $table->string('nome_mae', 100);
            $table->string('nome_pai', 100);
            $table->string('sexo', 1);
            $table->string('cpf', 14);
            $table->date('data_nascimento');
            $table->string('estado_civil',15);
            $table->bigInteger('pais_id')->unsigned(); 
            $table->foreign('pais_id')->references('id')->on('pais');
            $table->bigInteger('cidade_id')->unsigned(); 
            $table->foreign('cidade_id')->references('id')->on('cidades');
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
        Schema::dropIfExists('pessoas');
    }
}
