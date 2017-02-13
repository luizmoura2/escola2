<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imovel;
use App\Slide;
use App\Tipo;
use App\Cidade;

class HomeController extends Controller
{
   	public function index(){
   		$imoveis = Imovel::orderBy('id', 'desc')->paginate(2);
   		$slides = Slide::where('publicado','=','sim')->orderBy('ordem')->get();
   		$anim = ['left-align','right-align','center-align'];
   		$tipos = Tipo::orderBy('titulo')->get();
   	
   		$im = Imovel::orderBy('id', 'desc')->distinct('id')->get();
 		$cidades=[];
   		foreach ( $im as $vlr ) {
   			if (!in_array($vlr->cidades, $cidades)){
   				$cidades[] = $vlr->cidades;  
   			}
   		   	 		   
   		 }   
   		
   		$paginacao = true;
   		
   		$valor = ['0'=>'', '1'=>'', '2'=>'','3'=>'', '4'=>'', '5'=>'', '6'=>'','7'=>'', '8'=>'', '9'=>'', '10'=>''];
		$dormitorio=['0'=>'', '1'=>'', '2'=>'','3'=>'', '4'=>''];
		$campo['dormitorio'] = $dormitorio;
		$campo['valor'] = $valor;

    	return view('site.home', compact('imoveis', 'slides', 'anim', 'paginacao', 'tipos', 'cidades', 'campo'));
    }

    public function busca(Request $request){
    	$busca = $request->all();
    	
    	$tipos = Tipo::orderBy('titulo')->get(); 

    	$im = Imovel::orderBy('id', 'desc')->distinct()->get(); 
    	$cidades=[];
   		foreach ( $im as $vlr ) {
   		   	if (!in_array($vlr->cidades, $cidades)){
   				$cidades[] = $vlr->cidades;  
   			} 		   
   		 }  

   		$paginacao = false;

   		//dd($busca);
   		/*"status" => "aluga"
		  "tipo_id" => "1"
		  "cidade_id" => "1100288"
		  "dormitorio" => "1"
		  "valor" => "1"
		  "bairro" => nul*/

		$vlrStatus = ($busca['status'] == 'todos') ? [['status', '<>', null]] : [['status', '=', $busca['status']]];
		$vlrTipo   = ($busca['tipo_id'] == 'todos') ? [['tipo_id', '<>', null]] : [['tipo_id', '=', $busca['tipo_id']]];
		$vlrCidade = ($busca['cidade_id'] == 'todos') ? [['cidade_id', '<>', null]] : [['cidade_id', '=', $busca['cidade_id']]];
		$vlrDormit = ($busca['dormitorio'] == 'todos') ? [['dormitorio', '<>', null]] : [['dormitorio', '=', $busca['dormitorio']]];
		$vlrBairro = ($busca['bairro'] == 'todos') ? [['endereco', '<>', null]] : [['endereco', 'like', '%'.$busca['bairro'].'%']];
	
		$vlrValor = [
			  [['valor', '>=', 0]],
			  [['valor', '<=', 500]],
			  [['valor', '>=', 500], ['valor', '<=', 1000]],
			  [['valor', '>=', 1000], ['valor', '<=', 5000]],
			  [['valor', '>=', 5000], ['valor', '<=', 10000]],
			  [['valor', '>=', 10000], ['valor', '<=', 50000]],
			  [['valor', '>=', 500000], ['valor', '<=', 100000]],
			  [['valor', '>=', 100000], ['valor', '<=', 200000]],
			  [['valor', '>=', 200000], ['valor', '<=', 300000]],									  
			  [['valor', '>=', 300000], ['valor', '<=', 500000]],									  
			  [['valor', '>=', 500000], ['valor', '<=', 1000000]],									  
			  [['valor', '>', 1000000]],									  
		];
		
		
		$imoveis = Imovel::where('publicar','=','sim')
			->where($vlrStatus)
			->where($vlrTipo)
			->where($vlrCidade)
			->where($vlrDormit)
			->where($vlrBairro)
			->where($vlrValor[$busca['valor']])
			->orderBy('id', 'desc')->get();

		//dd()

		$dormitorio=['0'=>'', '1'=>'', '2'=>'','3'=>'', '4'=>''];
		$dormitorio[$busca['dormitorio']]='selected';
		$campo['dormitorio'] = $dormitorio;

		$valor = ['0'=>'', '1'=>'', '2'=>'','3'=>'', '4'=>'', '5'=>'', '6'=>'','7'=>'', '8'=>'', '9'=>'', '10'=>''];
		$valor[$busca['valor']]='selected';
		$campo['valor'] = $valor;

		//dd($campo);
    	return view('site.busca', compact('busca', 'imoveis', 'paginacao', 'tipos', 'cidades', 'campo'));
    }
}
