<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imovel;
use App\Tipo;
use App\Cidade;

class ImovelController extends Controller
{
    /*CRUD para Cidades*/
    //Lista
    public function index(){
    	$registros = Imovel::all();
    	
    	return view('admin.imoveis.index', compact('registros'));
    }

    //Adicionar
    public function adicionar(){
        $tipos = Tipo::all();
        $cidades = Cidade::all();
        $dormitorio=['0'=>'', '1'=>'', '2'=>'','3'=>'', '4'=>''];
        $campo['dormitorio'] = $dormitorio;
    	return view('admin.imoveis.adicionar', compact('tipos', 'cidades', 'campo'));
    }

    public function salvar(Request $request){

    	$dados = $request->all();
    	
    	$imovel = new Imovel();  
        $imovel->tipo_id = $dados['tipo_id'];
        $imovel->cidade_id  = $dados['cidade_id'];
        $imovel->titulo = $dados['titulo'];
        $imovel->descricao = $dados['descricao'];
        $file = $request->file('imagem');
    	if ($file){
    		$rand = rand(11111, 99999);
    		$dir = "img/imoveis/".$dados["id"]."/";
    		$ext = $file->guessClientExtension();
    		$nomArq = "_img_".$rand.".".$ext;
    		$file->move($dir, $nomArq);

    		$imovel->imagem = $dir.$nomArq;
    	}
        $imovel->status = $dados['status'];
        $imovel->endereco = $dados['endereco'];
        $imovel->dormitorio = $dados['dormitorio'];
        $imovel->cep = $dados['cep'];
        $imovel->valor = $dados['valor'];
        $imovel->mapa = $dados['mapa'];
        $imovel->publicar = $dados['publicar'];
        $imovel->save();

    	\Session::flash('mensage',['msg'=>'Im´vel cadastrado com sucesso!', 'class'=>'green white-text']);
			
		return redirect()->route('admin.imoveis');
    }

    //Atualizar
    public function editar($id){
    	$registro = Imovel::find($id);
    	$cidades = Cidade::all(); 
        $tipos = Tipo::all(); 
//dd($tipos);
        $dormitorio=['0'=>'', '1'=>'', '2'=>'','3'=>'', '4'=>''];
        $dormitorio[$registro['dormitorio']]='selected';
        $campo['dormitorio'] = $dormitorio;
	    	
    	return view('admin.imoveis.editar', compact('registro', 'tipos', 'cidades', 'campo'));
    }

    public function atualizar(Request $request){

    	$dados = $request->all();

    	$imovel = Imovel::find($dados['id']);
		$imovel->tipo_id = $dados['tipo_id'];
        $imovel->cidade_id  = $dados['cidade_id'];
        $imovel->titulo = $dados['titulo'];
        $imovel->descricao = $dados['descricao'];
       
        $imovel->status = $dados['status'];
        $imovel->endereco = $dados['endereco'];
        $imovel->dormitorio = $dados['dormitorio'];
        $imovel->cep = $dados['cep'];
        $imovel->valor = $dados['valor'];
        $imovel->mapa = $dados['mapa'];
        $imovel->publicar = $dados['publicar'];

        $file = $request->file('imagem');
        //dd($request);
    	if ($file){
    		$rand = rand(11111, 99999);
    		$dir = "img/imoveis/".$dados["id"]."/";
    		$ext = $file->guessClientExtension();
    		$nomArq = "_img_".$rand.".".$ext;
    		$file->move($dir, $nomArq);

    		$imovel->imagem = $dir.$nomArq;
    	}

        $imovel->save();

    	\Session::flash('mensage',['msg'=>'Imovel atualizada com sucesso!', 'class'=>'green white-text']);
			
    	return redirect()->route('admin.imoveis');
    }

    public function delete($id){
    	
    	$imovel = Imovel::find($id);    	
        //$Imovel->delete();
        $imovel->publicar = "nao";
        $imovel->observacao = 'Imóvel vendido';
        $imovel->update();
    	$msg = 'Exclusão do imovel: '.$imovel->titulo.', foi bem sucedida!';
        \Session::flash('mensage',['msg'=>$msg, 'class'=>'green white-text']);  
        
    	return redirect()->route('admin.imoveis');
    }
}
