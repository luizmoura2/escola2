<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Imovel;

class Cidade extends Model
{
    public function uf(){
    	return $this->belongsTo('App\Uf', 'uf_id');
    }

    public function endereco(){
    	return $this->hasMany('App\Endereco', 'cidade_id');
    }

    public function imoveis(){
    	return $this->hasMany('App\Imovel', 'cidade_id');
    }

    /*Verifica se a cidade esta referenciada por algum imóvel*/
    public function checkImovel($id){

    	return Imovel::where('cidade_id','=', $id )->count();

    }
}