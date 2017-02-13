<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tipo;
use App\Imovel;

class TipoController extends Controller
{
     
    /*CRUD para tipos*/
    //Lista
    public function index(){
    	$registros = Tipo::all();
    	return view('admin.tipo.index', compact('registros'));
    }

    //Adicionar
    public function adicionar(){
    	return view('admin.tipo.adicionar');
    }

    public function salvar(Request $request){

    	$dados = $request->all();
    	
    	$tipo = new Tipo();    	
    	$tipo->titulo = $dados['titulo'];    	
    	$tipo->save();
    	\Session::flash('mensage',['msg'=>'Tipo cadastrado com sucesso!', 'class'=>'green white-text']);
			
		return redirect()->route('admin.tipos');
    }

    //Atualizar
    public function editar($id){
    	$registro = Tipo::find($id);    	    	
    	return view('admin.tipo.editar', compact('registro'));
    }

    public function atualizar(Request $request){

    	$dados = $request->all();

    	$tipo = Tipo::find($dados['id']);
		$tipo->titulo = $dados['titulo'];
    	$tipo->save();

    	\Session::flash('mensage',['msg'=>'Tipo atualizado com sucesso!', 'class'=>'green white-text']);
			
    	return redirect()->route('admin.tipos');
    }

    public function delete($id){
    	
    	$tipo = Tipo::find($id);     	 	
    	if ( $tipo->checkImovel($id) > 0){
            $msg = 'Exclusão do tipo: '.$tipo->titulo.', não permitido, atribuido a imóveis!';        
            \Session::flash('mensage',['msg'=>$msg, 'class'=>'red white-text']);  
        }else{
            $msg = 'Exclusão do tipo: '.$tipo->titulo.', foi bem sucedida!';
            $tipo->delete();
    	   	\Session::flash('mensage',['msg'=>$msg, 'class'=>'green white-text']);			
    	}
    	return redirect()->route('admin.tipos');
    }

  
}
