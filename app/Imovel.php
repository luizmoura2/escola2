<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $table = "Imoveis";

    public function tipo(){
    	return $this->belongsTo('App\Tipo', 'tipo_id');
    }

    public function cidades(){
    	return $this->belongsTo('App\Cidade', 'cidade_id');
    }

    public function galerias(){
    	return $this->hasMany('App\Galeria', 'imovel_id');
    }

}
