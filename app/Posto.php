<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posto extends Model
{
    public function endereco(){
    	return $this->belongsTo('App\Endereco', 'endereco_id');
    }
}
