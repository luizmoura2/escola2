<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->bigInteger('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->string('titulo', 50);
            $table->string('descricao', 100);
            $table->string('imagem', 100);
            $table->enum('status', ['vende', 'aluga']);
            $table->string('endereco', 100);
            $table->integer('dormitorio');
            $table->string('cep', 9);
            $table->decimal('valor', 9, 2);
            $table->text('mapa');
            $table->bigInteger('visualizacoes')->default(0);
            $table->enum('publicar', ['sim', 'nao'])->default('nao');
            $table->string('observacao', 100)->nullable();
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
        Schema::dropIfExists('imovels');
    }
}
