<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome',100);
            $table->string('descricao', 100);
            $table->timestamps();
        });

        Schema::create('papel_permissao', function (Blueprint $table) {            
            $table->bigInteger('papel_id')->unsigned();
            $table->foreign('papel_id')->references('id')->on('papels')->onDelete('cascade');
            
            $table->bigInteger('permissao_id')->unsigned();
            $table->foreign('permissao_id')->references('id')->on('permissaos')->onDelete('cascade');
            $table->primary(['papel_id', 'permissao_id']);
        });

        Schema::create('papel_user', function (Blueprint $table) {            
            $table->bigInteger('papel_id')->unsigned();
            $table->foreign('papel_id')->references('id')->on('papels')->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->primary(['papel_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('papels');
    }
}
