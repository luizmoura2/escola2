<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    public function cidade(){
    	return $this->hasMany('App\Cidade', 'cidade_id');
    }
}
