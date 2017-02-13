<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuariosSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      if(User::where('email','=','luizmoura2@hotmail.com')->count()){
         $usuario = User::where('email','=','luizmoura2@hotmail.com')->first();
         $usuario->pessoa_id=1;
         $usuario->name= 'luiz Moura'; 
         $usuario->perfil_sis = 'admin';
         $usuario->cargo = 'Corretor';
         $usuario->orgao = 'Imobiliaria etc';
         $usuario->endereco_id = 1;
         $usuario->posto_id = 1;
         $usuario->email = 'luizmoura2@hotmail.com';
         $usuario->password = bcrypt('luciart');
         $usuario->save();
      }else{

         $usuario = new User();
         $usuario->pessoa_id=1;
         $usuario->name= 'luiz Moura'; 
         $usuario->perfil_sis = 'admin';
         $usuario->cargo = 'Corretor';
         $usuario->orgao = 'Imobiliaria etc';
         $usuario->endereco_id = 1;
         $usuario->posto_id = 1;
         $usuario->email = 'luizmoura2@hotmail.com';
         $usuario->password = bcrypt('luciart');
         $usuario->save();
    }
  }
}
