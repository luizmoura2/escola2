<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    public function imoveis(){
    	return $this->hasMany('App\Imovel', 'tipo_id');
    }

     /*Verifica se o tipo esta referenciada por algum imóvel*/
    public function checkImovel($id){

        return Imovel::where('tipo_id','=', $id )->count();

    }
}
