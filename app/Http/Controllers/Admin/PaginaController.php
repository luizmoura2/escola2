<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagina;

class PaginaController extends Controller
{
    public function index(){
    	$paginas = Pagina::all();
    	return view('admin.paginas.index', compact('paginas'));
    }

    public function editar($id){
    	$pagina = Pagina::find($id);
    	return view('admin.paginas.editar',compact('pagina'));
    }

    public function atualizar(Request $request){
    	
    	$dados = $request->all();
    	//dd($dados);
    	$pagina = Pagina::find($dados["id"]);

    	$pagina->titulo = trim($dados['titulo']);
    	$pagina->descricao = trim($dados['descricao']);
    	$pagina->texto = trim($dados['texto']);
    	isset($dados->email) ? $pagina->email = trim($dados['email']):'';
    	if (isset($dados["mapa"]) && trim($dados["mapa"]) != ''){
    		$pagina->mapa = trim($dados['mapa']);
    	}else{
    		$pagina->mapa = null;
    	}

    	$file = $request->file('imagem');
    	if ($file){
    		$rand = rand(11111, 99999);
    		$dir = "img/paginas/".$dados["id"]."/";
    		$ext = $file->guessClientExtension();
    		$nomArq = "_img_".$rand.".".$ext;
    		$file->move($dir, $nomArq);

    		$pagina->imagem = $dir."/".$nomArq;
    	}
    	$pagina->update();

    	\Session::flash('mensage', ['msg'=>'Atualização da página foi bem sucedida!', 'class'=>'green white-text']);

    	return redirect()->route('admin.paginas');
    }
}
