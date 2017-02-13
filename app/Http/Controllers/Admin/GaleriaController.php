<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Galeria;
use App\Imovel;

class GaleriaController extends Controller
{
     /*CRUD para Galerias*/

    //Lista
    public function index($id){

    	$imovel = Imovel::find($id);
    	//dd($imovel);
    	$registros = $imovel->galerias()->orderBy('ordem')->get();
    	return view('admin.galerias.index', compact('registros', 'imovel'));
    }

    //Adicionar
    public function adicionar($id){
    	$registro['imovel_id'] = $id;
    	return view('admin.galerias.adicionar', compact('registro'));
    }

     public function salvar(Request $request){

    	$dados = $request->all();
    	$imovel = Imovel::find($dados['imovel_id']);

    	$sequencia = 0;

    	if($imovel->galerias()->count()){
    		$reg = $imovel->galerias()->orderBy('ordem', 'desc')->first();
    		$sequencia = $reg->ordem; 
    	}

    	if ($request->hasFile('imagens')){
    		$arquivos = $request->file('imagens');

    		foreach ($arquivos as $file) {

    			$galeria = new Galeria();
    			$galeria->imovel_id = $dados['imovel_id']; 
    			$galeria->ordem = $sequencia+1;
    			$sequencia++; 

    			$rand = rand(11111, 99999);
	    		$dir = "img/imoveis/".str_slug($imovel->titulo, "_")."/" ;
	    		$ext = $file->guessClientExtension();
	    		$nomArq = "_img_".$rand.".".$ext;
	    		$file->move($dir, $nomArq);

	    		$galeria->imagem = $dir.$nomArq;

	    		$galeria->save();
    		}
    	}        

    	\Session::flash('mensage',['msg'=>'Galeria cadastrada com sucesso!', 'class'=>'green white-text']);
			
		return redirect()->route('admin.galerias', $dados['imovel_id']);
    }

     //Atualizar
    public function editar($id){

    	$registro = Galeria::find($id);
    	return view('admin.galerias.editar', compact('registro'));
    }

    public function atualizar(Request $request){

    	$dados = $request->all();

    	$galeria = Galeria::find($dados['id']);
		
    	//$galeria->imovel_id = $dados['imovel_id'];  
        $galeria->titulo = $dados['titulo'];
        $galeria->descricao  = $dados['descricao'];
        $galeria->ordem = $dados['ordem'];
        $file = $request->file('imagem');
    	if ($file){
    		$rand = rand(11111, 99999);
    		$dir = "img/imoveis/".$dados["id"]."/";
    		$ext = $file->guessClientExtension();
    		$nomArq = "_img_".$rand.".".$ext;
    		$file->move($dir, $nomArq);

    		$galeria->imagem = $dir.$nomArq;
    	}
       
        $galeria->save();

    	\Session::flash('mensage',['msg'=>'Galeria atualizada com sucesso!', 'class'=>'green white-text']);
			
    	return redirect()->route('admin.galerias', $dados['imovel_id']);
    }

    public function delete($id){
    	
    	$galeria = Galeria::find($id);    	
        $galeria->delete();        
    	$msg = 'Exclusão da galeria: '.$galeria->titulo.', foi bem sucedida!';
        \Session::flash('mensage',['msg'=>$msg, 'class'=>'green white-text']);  
        
    	return redirect()->route('admin.galerias', $galeria['imovel_id']);
    }


}
