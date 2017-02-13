<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cidade;
use App\Uf;

class CidadeController extends Controller
{
     
    /*CRUD para Cidades*/
    //Lista
    public function index(){
    	$registros = Cidade::orderBy('id')->paginate(100);
       	return view('admin.cidade.index', compact('registros'));
    }

    //Adicionar
    public function adicionar(){
        $ufs = Uf::all();
    	return view('admin.cidade.adicionar', compact('ufs'));
    }

    public function salvar(Request $request){

    	$dados = $request->all();
    	
    	$cidade = new Cidade();    	
    	$cidade->nome_municipio = $dados['nome_municipio'];
        $cidade->uf_id = $dados['uf_id'];        
        $cidade->cep_final = $dados['cep_final'];
        $cidade->cep_inicial = $dados['cep_inicial'];
        $cidade->ddd1  = $dados['ddd1'];
        $cidade->ddd2  = $dados['ddd2'];	
    	$cidade->save();

    	\Session::flash('mensage',['msg'=>'Cidade cadastrada com sucesso!', 'class'=>'green white-text']);
			
		return redirect()->route('admin.tipos');
    }

    //Atualizar
    public function editar($id){
    	$registro = Cidade::find($id); 
        $ufs = Uf::all(); 	    	
    	return view('admin.cidade.editar', compact('registro', 'ufs'));
    }

    public function atualizar(Request $request){

    	$dados = $request->all();

    	$cidade = Cidade::find($dados['id']);
		$cidade->nome_municipio = $dados['nome_municipio'];
        $cidade->uf_id = $dados['uf_id'];        
        $cidade->cep_final = $dados['cep_final'];
        $cidade->cep_inicial = $dados['cep_inicial'];
        $cidade->ddd1  = $dados['ddd1'];
        $cidade->ddd2  = $dados['ddd2'];    
    	$cidade->save();

    	\Session::flash('mensage',['msg'=>'Cidade atualizada com sucesso!', 'class'=>'green white-text']);
			
    	return redirect()->route('admin.cidades');
    }

    public function delete($id){
    	
    	$cidade = Cidade::find($id);  

    	if ( $cidade->checkImovel($id) > 0){
           $msg ='A cidade '.$cidade->nome_municipio.' não pode ser excluida, relacionada com imóveis'; 
            \Session::flash('mensage',['msg'=>$msg, 'class'=>'red white-text']);          
        }else{
           $cidade->delete();
    	   $msg = 'Exclusão do cidade: '.$cidade->nome_municipio.', foi bem sucedida!';
            \Session::flash('mensage',['msg'=>$msg, 'class'=>'green white-text']);  
        }
          
         	
    	
    	return redirect()->route('admin.cidades');
    }

}
