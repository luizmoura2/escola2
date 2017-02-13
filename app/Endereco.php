<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
   
	/* O endereco esta em uma cidade */
   public function cidade(){
    	return $this->belongsTo('App\Cidade', 'cidade_id');
    }

    /* O endereço esta em vários postos */
    public function posto(){
    	return $this->hasMany('App\Posto', 'posto_id');
    }

    public function usuario(){
    	return $this->hasMany('App\User', 'user_id');
    }


}
