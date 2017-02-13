<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('pessoa_id')->unsigned(); 
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
            $table->string('name', 100);
            $table->string('perfil_sis',60);
            $table->string('cargo',60); 
            $table->string('orgao',60); 
            $table->bigInteger('endereco_id')->unsigned(); 
            $table->foreign('endereco_id')->references('id')->on('enderecos');
            $table->bigInteger('posto_id')->unsigned(); 
            $table->foreign('posto_id')->references('id')->on('postos'); 
            $table->string('email',100)->unique();
            $table->string('password', 65;
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
