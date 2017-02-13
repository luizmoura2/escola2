<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('nome_municipio', 100);
            $table->bigInteger('uf_id')->unsigned();
            $table->foreign('uf_id')->references('id')->on('ufs');
            $table->string('cep_final',10);
            $table->string('cep_inicial',10);
            $table->string('ddd1', 3);
            $table->string('ddd2', 3);
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
        Schema::dropIfExists('cidades');
    }
}
