<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Posto;
use App\Pais;
use App\Cidade;
use App\Pessoa;
use App\Endereco;
use App\Papel;

class UsuarioController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    
    public function autoriza($papel){
        if(!auth()->user()->can($papel)){
            \Session::flash('mensage',['msg'=>'Usuario não autorizado!', 'class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }
    }

    public function login(Request $req){
    	$dados = $req->all();
    	if(Auth::attempt(['email'=>$dados['email'], 'password'=>$dados['password']])){
    		\Session::flash('mensage',['msg'=>'Login bem sucedido!', 'class'=>'green white-text']);
			return redirect()->route('admin.principal');
		}else{
			\Session::flash('mensage',['msg'=>'Erro! Verifica a senha e usuario!', 'class'=>'red white-text']);
			return redirect()->route('admin.login');	
		}
    	
    }
    public function sair(){
    	Auth::logout();
    	return redirect()->route('admin.login');
    }

    /*CRUD para usuarios*/
    public function index(){

        $this->autoriza('usuario_listar');

        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }
    //Adicionar
    public function adicionar(){
        /*if(!auth()->user()->can('usuario_adicionar')){
            \Session::flash('mensage',['msg'=>'Usuario não autorizado!', 'class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }*/
        $this->autoriza('usuario_adicionar');

    	$postos = Posto::all();
    	$paises = Pais::all();
    	$cidades = Cidade::all();
    	return view('admin.usuarios.adicionar', compact('postos', 'paises', 'cidades'));
    }

    public function salvar(Request $request){

    	$dados = $request->all();
    	
    	$pessoa = new Pessoa();
    	$pessoa->id = NULL;
    	$pessoa->nome = $dados['nome'];
    	$pessoa->tipo_pessoa = $dados['tipo_pessoa'];
    	$pessoa->nome_mae = $dados['nome_mae'];
    	$pessoa->nome_pai = $dados['nome_pai'];
    	$pessoa->sexo = $dados['sexo'];
    	$pessoa->cpf = $dados['cpf'];
    	$pessoa->data_nascimento = $dados['data_nascimento'];
    	$pessoa->estado_civil = $dados['estado_civil'];
    	$pessoa->pais_id = $dados['pais_id'];
    	$pessoa->cidade_id = $dados['cidade_id'];
    	$pessoa->save();
    	
    	$endereco =new Endereco();
    	$endereco->id = NULL;
    	$endereco->logradouro = $dados['logradouro'];
    	$endereco->bairro = $dados['bairro'];
    	$endereco->complemento = $dados['complemento'];
    	$endereco->numero = $dados['numero'];
    	$endereco->telefone = $dados['telefone'];
    	$endereco->cidade_id = $dados['cidade_id_adress'];
    	$endereco->save();

    	$usuario = new User();
    	$usuario->pessoa_id = $pessoa->id;
    	$usuario->name = $dados['name'];
    	$usuario->endereco_id = $endereco->id;
    	$usuario->perfil_sis = $dados['perfil_sis'];
    	$usuario->cargo = $dados['cargo'];
    	$usuario->orgao = $dados['orgao'];
    	$usuario->email = $dados['email'];
    	$usuario->password = bcrypt($dados['password']);
    	$usuario->posto_id = $dados['posto_id'];
    	$usuario->save();
    	\Session::flash('mensage',['msg'=>'Usuario cadastrado com sucesso!', 'class'=>'green white-text']);
			
		return redirect()->route('admin.usuarios');
    }

    //Atualizar
    public function editar($id){
        /*if(!auth()->user()->can('usuario_editar')){
            \Session::flash('mensage',['msg'=>'Usuario não autorizado!', 'class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }*/

        $this->autoriza('usuario_editar');
    	$postos = Posto::all();
    	$paises = Pais::all();
    	$cidades = Cidade::all();

    	$usuario = User::find($id);
    	$pessoa = Pessoa::find($usuario->pessoa_id);
    	$endereco = Endereco::find($usuario->endereco_id);
    	$endereco->cidade_id_adress = $endereco->cidade_id;
    	
    	return view('admin.usuarios.editar', compact('postos', 'paises', 'cidades', 'usuario', 'pessoa', 'endereco'));
    }

    public function atualizar(Request $request){

    	$dados = $request->all();
    	//dd($dados);

    	$usuario = User::find($dados['id']);

		$usuario->name = $dados['name'];
    	$usuario->perfil_sis = $dados['perfil_sis'];
    	$usuario->cargo = $dados['cargo'];
    	$usuario->orgao = $dados['orgao'];
    	$usuario->email = $dados['email'];
    	if(isset($dados['password']) && strlen($dados['password'])>5){
    		$usuario->password = bcrypt($dados['password']);
    	}else{
    		unset($dados['password']);
    	}    	
    	$usuario->posto_id = $dados['posto_id'];
    	$usuario->save();

    	$pessoa = Pessoa::find($usuario->pessoa_id);

    	$pessoa->nome = $dados['nome'];
    	$pessoa->tipo_pessoa = $dados['tipo_pessoa'];
    	$pessoa->nome_mae = $dados['nome_mae'];
    	$pessoa->nome_pai = $dados['nome_pai'];
    	$pessoa->sexo = $dados['sexo'];
    	$pessoa->cpf = $dados['cpf'];
    	$pessoa->data_nascimento = $dados['data_nascimento'];
    	$pessoa->estado_civil = $dados['estado_civil'];
    	$pessoa->pais_id = $dados['pais_id'];    	
    	$pessoa->cidade_id = $dados['cidade_id'];
    	$pessoa->save();
    	
    	$endereco = Endereco::find($usuario->endereco_id);

    	$endereco->logradouro = $dados['logradouro'];
    	$endereco->bairro = $dados['bairro'];
    	$endereco->complemento = $dados['complemento'];
    	$endereco->numero = $dados['numero'];
    	$endereco->telefone = $dados['telefone'];
    	$endereco->cidade_id = $dados['cidade_id_adress'];
    	$endereco->save();

    	\Session::flash('mensage',['msg'=>'Usuario atualizado com sucesso!', 'class'=>'green white-text']);
			
    	return redirect()->route('admin.usuarios');
    }

    public function delete($id){
    	/*if(!auth()->user()->can('usuario_deletar')){
            \Session::flash('mensage',['msg'=>'Usuario não autorizado!', 'class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }*/

        $this->autoriza('usuario_deletar');
    	$usuario = User::find($id);     	 	
    	$endereco = Endereco::find($usuario->endereco_id);
    	$pessoa = Pessoa::find($usuario->pessoa_id);

    	$msg = 'Exclusão do Usuario: '.$pessoa->nome.', foi bem sucedida!';

    	$usuario->delete();
    	$endereco->delete();
    	$pessoa->delete();
    	
    	\Session::flash('mensage',['msg'=>$msg, 'class'=>'green white-text']);			
    	
    	return redirect()->route('admin.usuarios');
    }

    /* Rotinas para atribuição de papeis*/
    public function papel($id){
        /*if(!auth()->user()->can('papel_listar')){
            \Session::flash('mensage',['msg'=>'Usuario não autorizado!', 'class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }*/
        $this->autoriza('papel_listar');
        $usuario = User::find($id);
        $papeis = Papel::all();
        return view('admin.usuarios.papel', compact('usuario', 'papeis'));
    }

    public function salvarPapel(Request $request){
        
        $dados = $request->all();

        $usuario = User::find($dados['id']);
        $papel = Papel::find($dados['papel_id']);

        if ($usuario->existePapel($papel->nome)){

             \Session::flash('mensage',['msg'=>'Usuario já possui o papel: '.$papel->nome.'!', 'class'=>'yellow black-text']);
             return redirect()->back();
        }
        $usuario->adicionarPapel($papel);
        \Session::flash('mensage',['msg'=>'Atribuição de papel '.$papel->nome.', inserido com sucesso!', 'class'=>'green white-text']);
        return redirect()->back();
    }

    public function removerPapel($id, $papel_id){
        /*if(!auth()->user()->can('papel_atribuir')){
            \Session::flash('mensage',['msg'=>'Usuario não autorizado!', 'class'=>'red white-text']);
            return redirect()->route('admin.principal');
        }*/
        $this->autoriza('papel_deletar');
        $usuario = User::find($id);
        $papel = Papel::find($papel_id);
        $usuario->removePapel($papel);
        \Session::flash('mensage',['msg'=>'Atribuição de papel '.$papel->nome.', removido sucesso!', 'class'=>'green white-text']);
        return redirect()->back();
    }
}