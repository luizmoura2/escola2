<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Papel;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'perfil_sis', 'cargo', 
        'orgao','endereco_id','posto_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function papeis(){
        return $this->belongsToMany(Papel::class);
    }

    public function adicionarPapel($papel){
        if(is_string($papel)){
            return $this->papeis()->save(
                    Papel::where('nome', '=', $papel)->firstOrFail()
                );
        }

        return $this->papeis()->save(
                Papel::where('nome', '=', $papel->nome)->firstOrFail()
            );
    }

    public function removePapel($papel){

        if(is_string($papel)){
            return $this->papeis()->detach(
                    Papel::where('nome', '=', $papel)->firstOrFail()
                );
        }

        return $this->papeis()->detach(
                Papel::where('nome', '=', $papel->nome)->firstOrFail()
            );

    }

    public function existePapel($papel){
        
        if(is_string($papel)){
            return $this->papeis->contains('nome', $papel);
        }

        return $papel->intersect($this->papeis)->count();
    }

    public function existeMaster(){
        return $this->existePapel('Master');
    }
}
