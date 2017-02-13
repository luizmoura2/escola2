<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

	Route::get('/', ['as'=>'site.home', 'uses'=>'Site\HomeController@index']);

	Route::get('/busca', ['as'=>'site.busca', 'uses'=>'Site\HomeController@busca']);

	Route::get('/sobre', ['as'=>'site.sobre', 'uses'=>'Site\PaginaController@sobre']);
	Route::get('/contato', ['as'=>'site.contato', 'uses'=>'Site\PaginaController@contato']);
	Route::post('/contato/enviar', ['as'=>'site.contato.enviar', 'uses'=>'Site\PaginaController@enviarContato']);

	Route::get('/imovel/{id}/{titulo?}', ['as'=>'site.imovel', 'uses'=>'Site\ImovelController@index']);



	// Auth::routes();
	Route::get('/admin/login', ['as'=>'admin.login', function(){
		return view('admin.login.index');
	}]);

	Route::post('/admin/login', ['as'=>'admin.login', 'uses'=>'Admin\UsuarioController@login']);

	Route::group(['middleware'=>'m_auth'], function(){

	Route::get('/admin/login/sair', ['as'=>'admin.login.sair', 'uses'=>'Admin\UsuarioController@sair']);

	Route::get('/admin', ['as'=>'admin.principal', function(){
		return view('admin.principal.index');
	}]);

	/*CRUD para usuarios*/
	Route::get('/admin/usuarios', ['as'=>'admin.usuarios', 'uses'=>'Admin\UsuarioController@index']);
	//Adicionar
	Route::get('/admin/usuarios/adicionar', ['as'=>'admin.usuarios.adicionar', 'uses'=>'Admin\UsuarioController@adicionar']);
	Route::post('/admin/usuarios/salvar', ['as'=>'admin.usuarios.salvar', 'uses'=>'Admin\UsuarioController@salvar']);
	//Atualizar
	Route::get('/admin/usuarios/editar/{id}', ['as'=>'admin.usuarios.editar', 'uses'=>'Admin\UsuarioController@editar']);
	Route::put('/admin/usuarios/atualizar', ['as'=>'admin.usuarios.atualizar', 'uses'=>'Admin\UsuarioController@atualizar']);
	//Deletar
	Route::get('/admin/usuarios/delete/{id}', ['as'=>'admin.usuarios.delete', 'uses'=>'Admin\UsuarioController@delete']);

	/*CRUD para atribuir papel a usuarios*/
	Route::get('/admin/usuarios/papel/{id}', ['as'=>'admin.usuarios.papel', 'uses'=>'Admin\UsuarioController@papel']);
	Route::post('/admin/usuarios/papel/salvar', ['as'=>'admin.usuarios.papel.salvar', 'uses'=>'Admin\UsuarioController@salvarPapel']);
	Route::get('/admin/usuarios/{id}/papel/{papel_id}/remover', ['as'=>'admin.usuarios.papel.remover', 'uses'=>'Admin\UsuarioController@removerPapel']);

	//Administração de páginas
	Route::get('/admin/paginas', ['as'=>'admin.paginas', 'uses'=>'Admin\PaginaController@index']);
	Route::get('/admin/paginas/editar/{id}', ['as'=>'admin.pagina.editar', 'uses'=>'Admin\PaginaController@editar']);
	Route::put('/admin/paginas/atualizar', ['as'=>'admin.pagina.atualizar', 'uses'=>'Admin\PaginaController@atualizar']);

	/**CRUD para tipo*/
	Route::get('/admin/tipos', ['as'=>'admin.tipos', 'uses'=>'Admin\TipoController@index']);
	//Adicionar
	Route::get('/admin/tipo/adicionar', ['as'=>'admin.tipo.adicionar', 'uses'=>'Admin\TipoController@adicionar']);
	Route::post('/admin/tipo/salvar', ['as'=>'admin.tipo.salvar', 'uses'=>'Admin\TipoController@salvar']);
	//Atualizar
	Route::get('/admin/tipo/editar/{id}', ['as'=>'admin.tipo.editar', 'uses'=>'Admin\TipoController@editar']);
	Route::put('/admin/tipo/atualizar', ['as'=>'admin.tipo.atualizar', 'uses'=>'Admin\TipoController@atualizar']);
	//Deletar
	Route::get('/admin/tipo/delete/{id}', ['as'=>'admin.tipo.delete', 'uses'=>'Admin\TipoController@delete']);

	/**CRUD para cidade*/
	Route::get('/admin/cidades', ['as'=>'admin.cidades', 'uses'=>'Admin\CidadeController@index']);
	//Adicionar
	Route::get('/admin/cidade/adicionar', ['as'=>'admin.cidade.adicionar', 'uses'=>'Admin\CidadeController@adicionar']);
	Route::post('/admin/cidade/salvar', ['as'=>'admin.cidade.salvar', 'uses'=>'Admin\CidadeController@salvar']);
	//Atualizar
	Route::get('/admin/cidade/editar/{id}', ['as'=>'admin.cidade.editar', 'uses'=>'Admin\CidadeController@editar']);
	Route::put('/admin/cidade/atualizar', ['as'=>'admin.cidade.atualizar', 'uses'=>'Admin\CidadeController@atualizar']);
	//Deletar
	Route::get('/admin/cidade/delete/{id}', ['as'=>'admin.cidade.delete', 'uses'=>'Admin\CidadeController@delete']);


	/**CRUD para Imovel*/
	Route::get('/admin/imoveis', ['as'=>'admin.imoveis', 'uses'=>'Admin\ImovelController@index']);
	//Adicionar
	Route::get('/admin/imovel/adicionar', ['as'=>'admin.imovel.adicionar', 'uses'=>'Admin\ImovelController@adicionar']);
	Route::post('/admin/imovel/salvar', ['as'=>'admin.imovel.salvar', 'uses'=>'Admin\ImovelController@salvar']);
	//Atualizar
	Route::get('/admin/imovel/editar/{id}', ['as'=>'admin.imovel.editar', 'uses'=>'Admin\ImovelController@editar']);
	Route::put('/admin/imovel/atualizar', ['as'=>'admin.imovel.atualizar', 'uses'=>'Admin\ImovelController@atualizar']);
	//Deletar
	Route::get('/admin/imovel/delete/{id}', ['as'=>'admin.imovel.delete', 'uses'=>'Admin\ImovelController@delete']);



	/**CRUD para Galeria de imagens*/
	Route::get('/admin/galerias/{id}', ['as'=>'admin.galerias', 'uses'=>'Admin\GaleriaController@index']);
	//AdicionarGaleriaController
	Route::get('/admin/galerias/adicionar/{id}', ['as'=>'admin.galeria.adicionar', 'uses'=>'Admin\GaleriaController@adicionar']);
	Route::post('/admin/galerias/salvar', ['as'=>'admin.galeria.salvar', 'uses'=>'Admin\GaleriaController@salvar']);
	//Atualizar
	Route::get('/admin/galerias/editar/{id}', ['as'=>'admin.galeria.editar', 'uses'=>'Admin\GaleriaController@editar']);
	Route::put('/admin/galerias/atualizar', ['as'=>'admin.galeria.atualizar', 'uses'=>'Admin\GaleriaController@atualizar']);
	//Deletar
	Route::get('/admin/galerias/delete/{id}', ['as'=>'admin.galeria.delete', 'uses'=>'Admin\GaleriaController@delete']);

	/**CRUD para Slides*/
	Route::get('/admin/slides', ['as'=>'admin.slides', 'uses'=>'Admin\SlideController@index']);
	//Adicionar SlideController
	Route::get('/admin/slides/adicionar', ['as'=>'admin.slide.adicionar', 'uses'=>'Admin\SlideController@create']);
	Route::post('/admin/slides/salvar', ['as'=>'admin.slides.salvar', 'uses'=>'Admin\SlideController@store']);
	//Atualizar
	Route::get('/admin/slides/editar/{id}', ['as'=>'admin.slide.editar', 'uses'=>'Admin\SlideController@edit']);
	Route::put('/admin/slides/atualizar', ['as'=>'admin.slide.atualizar', 'uses'=>'Admin\SlideController@update']);
	//Deletar
	Route::get('/admin/slides/delete/{id}', ['as'=>'admin.slide.delete', 'uses'=>'Admin\SlideController@destroy']);


	/**CRUD para Papeis*/
	Route::get('/admin/papel', ['as'=>'admin.papel', 'uses'=>'Admin\PapelController@index']);
	//Adicionar SlideController
	Route::get('/admin/papel/adicionar', ['as'=>'admin.papel.adicionar', 'uses'=>'Admin\PapelController@create']);
	Route::post('/admin/papel/salvar', ['as'=>'admin.papel.salvar', 'uses'=>'Admin\PapelController@store']);
	//Atualizar
	Route::get('/admin/papel/editar/{id}', ['as'=>'admin.papel.editar', 'uses'=>'Admin\PapelController@edit']);
	Route::put('/admin/papel/atualizar', ['as'=>'admin.papel.atualizar', 'uses'=>'Admin\PapelController@update']);
	//Deletar
	Route::get('/admin/papel/delete/{id}', ['as'=>'admin.papel.delete', 'uses'=>'Admin\PapelController@destroy']);
	
	//Papel permissao
	Route::get('/admin/papel/permissao/{id}', ['as'=>'admin.papel.permissao', 'uses'=>'Admin\PapelController@permissao']);
	Route::post('/admin/papel/permissao/salvar', ['as'=>'admin.papel.permissao.salvar', 'uses'=>'Admin\PapelController@salvarPermissao']);
	Route::get('/admin/papel/permissao/remover/{id}/{permissao_id}', ['as'=>'admin.papel.permissao.remover', 'uses'=>'Admin\PapelController@removerPermissao']);

});