<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Papel;
use App\Permissao;

class PapelController extends Controller
{
    public function index(){
    	$registros = Papel::all();
    	return view('admin.papel.index', compact('registros'));
    }

    public function create(){

    	return view('admin.papel.adicionar');
    }

    public function store(Request $request){
    	$dados = $request->all();

    	if($dados['nome'] == 'Master'){
    		\Session::flash('mensage', ['msg'=>'O Papel master não pode se alterado!', 'class'=>'red white-text']);
    		return redirect()->route('admin.papel');
    	}

    	Papel::create($request->all());
    	\Session::flash('mensage', ['msg'=>'Papel salvo com sucesso!', 'class'=>'green white-text']);
    	return redirect()->route('admin.papel');
    }

    public function edit($id){
    	$registro = Papel::find($id);
    	return view('admin.papel.editar', compact('registro'));
    }

    public function update(Request $request){
    	$dados = $request->all();
    	//dd($dados);
    	if($dados['nome'] == 'Master'){
    		\Session::flash('mensage', ['msg'=>'O Papel master não pode se alterado!', 'class'=>'red white-text']);
    		return redirect()->route('admin.papel');
    	}
    	Papel::find($dados['id'])->update($dados);
    	\Session::flash('mensage', ['msg'=>'Papel salvo com sucesso!', 'class'=>'green white-text']);
    	return redirect()->route('admin.papel');
    }

    public function destroy($id){
    	
    	$dados = Papel::find($id);

    	if($dados->nome == 'Master'){
    		\Session::flash('mensage', ['msg'=>'O Papel master não pode se excluido!', 'class'=>'red white-text']);
    		return redirect()->route('admin.papel');
    	}

    	$dados->delete();
    	\Session::flash('mensage', ['msg'=>'O Papel excluido com sucesso!', 'class'=>'green white-text']);
    	return redirect()->route('admin.papel');
    }

    public function permissao($id){
        $papel = Papel::find($id);
        $permissaos = Permissao::all();

        return view('admin.papel.permissao', compact('papel', 'permissaos'));
    }

    public function salvarPermissao(Request $request){
        $data = $request->all();
        
        $papel = Papel::find($data['id']);

        if($papel->permissoes()->where('id','=',$data['permissao_id'])->count()){
            \Session::flash('mensage',['msg'=>'A permissao já esta atribuida ao papel!', 'class'=>'red white-text']);
            return redirect()->back(); 
        }

        $permissao = Permissao::find($data['permissao_id']);
        $papel->adicionarPermissao($permissao);

        \Session::flash('mensage',['msg'=>'Atribuição da permissao foi bem sucedida!', 'class'=>'green white-text']);

        return redirect()->back();        

    }
    public function removerPermissao($id, $permissao_id){

        $papel = Papel::find($id);
        $permissao = Permissao::find($permissao_id);
        $papel->removerPermissao($permissao);

        \Session::flash('mensage',['msg'=>'A remoção da permissao foi bem sucedida!', 'class'=>'green white-text']);        

        return redirect()->back();        

    }
}
