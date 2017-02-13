<?php

use Illuminate\Database\Seeder;
use App\Papel;

class PapelSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Papel::where('nome','=','Master')->count()){
        	$admin = Papel::create(['nome'=>'Master', 'descricao'=>'O Proprietário do sistema']);
        }

        if(!Papel::where('nome','=','Admin')->count()){
        	$admin = Papel::create(['nome'=>'Admin', 'descricao'=>'O Administrador do sistema']);
        }
        if(!Papel::where('nome','=','Gerente')->count()){
        	$admin = Papel::create(['nome'=>'Gerente', 'descricao'=>'O Gerente do sistema']);
        }
        if(!Papel::where('nome','=','Vendedor')->count()){
        	$admin = Papel::create(['nome'=>'Vendedor', 'descricao'=>'Grupo de vendas']);
        }
    }
}
