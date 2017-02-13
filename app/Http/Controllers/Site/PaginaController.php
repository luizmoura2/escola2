<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagina;

class PaginaController extends Controller
{
    public function sobre(){

        $pagina = Pagina::where('tipo','=','sobre')->first();

        return view('site.sobre', compact('pagina'));
    }

    public function contato(){

    	$pagina = Pagina::where('tipo','=','contato')->first();

    	return view('site.contato', compact('pagina'));
    }

    public function enviarContato(Request $request){
    	$dados = $request->all();
    	$pagina = Pagina::where('tipo','=','contato')->first();
    	//dd($request)
    	$email = $pagina->email;

    	\Mail::send('emails.contato', ['request'=>$request], 
    		function($m) use($request, $email){
    			$m->from($request['email'], $request['nome']);
    			$m->replyTo($request['email'], $request['nome']);
    			$m->subject('Contato do Sistema ALCOM Imóveis');
    			$m->to($email, 'Solicitação de Detalhes de Imóvel');
    	});
    	\Session::flash('mensage', ['msg'=>'Contato foi enviado com sucesso!', 'class'=>'green white-text']);
    	return redirect()->route('site.contato');
    }
}