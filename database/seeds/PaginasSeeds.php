<?php

use Illuminate\Database\Seeder;
use App\Pagina;
class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	//verifica quantas paginas do tipo sobre ja esta cadastrada
        $existe = Pagina::where('tipo','=','sobre')->count();

        if($existe){
        	$paginaSobre = Pagina::where('tipo','=','sobre')->first();
        }else{
        	$paginaSobre = new Pagina();
        	$paginaSobre->titulo = "A empresa";
        	$paginaSobre->descricao = "A descricao da empresa";
        	$paginaSobre->texto = "O texto descrição sobre a empresa";
        	$paginaSobre->imagem = "site/img/modelo_imagem_home.jpg";
        	$paginaSobre->mapa ='<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15551.15806491243!2d-38.46947868272705!3d-12.985310244433272!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x351dfea91d98fd37!2sHiper+Bompre%C3%A7o!5e0!3m2!1spt-BR!2sbr!4v1486071226513" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
        	$paginaSobre->tipo = "sobre";
        	$paginaSobre->save();
        	echo 'Pagina sobre criada com sucesso!';
        }


         $existe = Pagina::where('tipo','=','contato')->count();

        if($existe){
            $paginaContato = Pagina::where('tipo','=','contato')->first();
        }else{
            $paginaContato = new Pagina();
            $paginaContato->titulo = "Entre em contato";
            $paginaContato->descricao = "Preencha o formuláro";
            $paginaContato->texto = "Contato";
            $paginaContato->imagem = "site/img/modelo_imagem_home.jpg";
            $paginaContato->email= "luizmoura2@hotmail.com";
            $paginaContato->tipo = "contato";
            $paginaContato->save();

            echo 'Pagina contato criada com sucesso!';
        }
    }
}
