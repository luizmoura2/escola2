<?php

use Illuminate\Database\Seeder;
use App\Permissao;

class PermissaoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Permissao::where('nome','=','usuario_listar')->count()){
        		Permissao::create(['nome'=>'usuario_listar', 'descricao'=>'Listar os ususarios']);
        }else{
        	$permissao = Permissao::where('nome','=','usuario_listar')->first();
        	$permissao->update(
        			['nome'=>'usuario_listar', 'descricao'=>'Listar os ususarios']
        		);
        }

        if(!Permissao::where('nome','=','usuario_adicionar')->count()){
        		Permissao::create(['nome'=>'usuario_adicionar', 'descricao'=>'Adicionar os ususarios']);
        }else{
        	$permissao = Permissao::where('nome','=','usuario_adicionar')->first();
        	$permissao->update(
        			['nome'=>'usuario_adicionar', 'descricao'=>'Adicionar os ususarios']
        		);
        }

        if(!Permissao::where('nome','=','usuario_editar')->count()){
        		Permissao::create(['nome'=>'usuario-editar', 'descricao'=>'Editar os ususarios']);
        }else{
        	$permissao = Permissao::where('nome','=','usuario_editar')->first();
        	$permissao->update(
        			['nome'=>'usuario_editar', 'descricao'=>'Editar os ususarios']
        		);
        }

        if(!Permissao::where('nome','=','usuario_remover')->count()){
        		Permissao::create(['nome'=>'usuario_remover', 'descricao'=>'Remover os ususarios']);
        }else{
        	$permissao = Permissao::where('nome','=','usuario_remover')->first();
        	$permissao->update(
        			['nome'=>'usuario_remover', 'descricao'=>'Remover os ususarios']
        		);
        }


        if(!Permissao::where('nome','=','papel_listar')->count()){
            Permissao::create([
                    'nome'=>'papel_listar',
                    'descricao'=>'Listar Papéis'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','papel_listar')->first();
            $permissao->update([
                    'nome'=>'papel_listar',
                    'descricao'=>'Listar Papéis'
                ]);
        }

        if(!Permissao::where('nome','=','papel_adicionar')->count()){
            Permissao::create([
                    'nome'=>'papel_adicionar',
                    'descricao'=>'Adicionar Papéis'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','papel_adicionar')->first();
            $permissao->update([
                    'nome'=>'papel_adicionar',
                    'descricao'=>'Adicionar Papéis'
                ]);
        }

        if(!Permissao::where('nome','=','papel_editar')->count()){
            Permissao::create([
                    'nome'=>'papel_editar',
                    'descricao'=>'Editar Papéis'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','papel_editar')->first();
            $permissao->update([
                    'nome'=>'papel_editar',
                    'descricao'=>'Editar Papéis'
                ]);
        }

        if(!Permissao::where('nome','=','papel_deletar')->count()){
            Permissao::create([
                    'nome'=>'papel_deletar',
                    'descricao'=>'Deletar Papéis'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','papel_deletar')->first();
            $permissao->update([
                    'nome'=>'papel_deletar',
                    'descricao'=>'Deletar Papéis'
                ]);
        }

        if(!Permissao::where('nome','=','papel_atribuir')->count()){
            Permissao::create([
                    'nome'=>'papel_atribuir',
                    'descricao'=>'Atribuir papel a usuario'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','papel_atribuir')->first();
            $permissao->update([
                    'nome'=>'papel_atribuir',
                    'descricao'=>'Atribuir papel a usuario'
                ]);
        }

        if(!Permissao::where('nome','=','pagina_listar')->count()){
            Permissao::create([
                    'nome'=>'pagina_listar',
                    'descricao'=>'Listar as páginas do sistema'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','pagina_listar')->first();
            $permissao->update([
                    'nome'=>'pagina_listar',
                    'descricao'=>'Listar as páginas do sistema'
                ]);
        }

        if(!Permissao::where('nome','=','pagina_editar')->count()){
            Permissao::create([
                    'nome'=>'pagina_editar',
                    'descricao'=>'Editar páginas do sistema'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','pagina_editar')->first();
            $permissao->update([
                    'nome'=>'pagina_editar',
                    'descricao'=>'Editar páginas do sistema'
                ]);
        }

        if(!Permissao::where('nome','=','tipos_listar')->count()){
            Permissao::create([
                    'nome'=>'tipos_listar',
                    'descricao'=>'Listar os tipos de imóveis'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','tipos_listar')->first();
            $permissao->update([
                    'nome'=>'tipos_listar',
                    'descricao'=>'Listar os tipos de imóveis'
                ]);
        }

        if(!Permissao::where('nome','=','tipos_adicionar')->count()){
            Permissao::create([
                    'nome'=>'tipos_adicionar',
                    'descricao'=>'Adicionar tipos de imóveis'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','tipos_adicionar')->first();
            $permissao->update([
                    'nome'=>'tipos_adicionar',
                    'descricao'=>'Adicionar tipos de imóveis'
                ]);
        }

        if(!Permissao::where('nome','=','tipos_editar')->count()){
            Permissao::create([
                    'nome'=>'tipos_editar',
                    'descricao'=>'Editar os tipos de imóveis'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','tipos_editar')->first();
            $permissao->update([
                    'nome'=>'tipos_editar',
                    'descricao'=>'Editar os tipos de imóveis'
                ]);
        }

        if(!Permissao::where('nome','=','tipos_excluir')->count()){
            Permissao::create([
                    'nome'=>'tipos_excluir',
                    'descricao'=>'Excluir tipos de imóveis'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','tipos_excluir')->first();
            $permissao->update([
                    'nome'=>'tipos_excluir',
                    'descricao'=>'Excluir tipos de imóveis'
                ]);
        }

        if(!Permissao::where('nome','=','cidades_listar')->count()){
            Permissao::create([
                    'nome'=>'cidades_listar',
                    'descricao'=>'Listar as cidades'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','cidades_listar')->first();
            $permissao->update([
                    'nome'=>'cidades_listar',
                    'descricao'=>'Listar as cidades'
                ]);
        }
        if(!Permissao::where('nome','=','cidades_adicionar')->count()){
            Permissao::create([
                    'nome'=>'cidades_adicionar',
                    'descricao'=>'Adicionar cidades'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','cidades_adicionar')->first();
            $permissao->update([
                    'nome'=>'cidades_adicionar',
                    'descricao'=>'Adicionar cidades'
                ]);
        }

        if(!Permissao::where('nome','=','cidades_editar')->count()){
            Permissao::create([
                    'nome'=>'cidades_editar',
                    'descricao'=>'Editar os dados da cidades'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','cidades_editar')->first();
            $permissao->update([
                    'nome'=>'cidades_editar',
                    'descricao'=>'Editar os dados da cidades'
                ]);
        }

        if(!Permissao::where('nome','=','cidades_excluir')->count()){
            Permissao::create([
                    'nome'=>'cidades_excluir',
                    'descricao'=>' Excluir os dados da cidades'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','cidades_excluir')->first();
            $permissao->update([
                    'nome'=>'cidades_excluir',
                    'descricao'=>' Excluir os dados da cidades'
                ]);
        }

        if(!Permissao::where('nome','=','imoveis_listar')->count()){
            Permissao::create([
                    'nome'=>'imoveis_listar',
                    'descricao'=>'Listar os imóveis cadastrados'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','imoveis_listar')->first();
            $permissao->update([
                    'nome'=>'imoveis_listar',
                    'descricao'=>'Listar os imóveis cadastrados'
                ]);
        }

        if(!Permissao::where('nome','=','imoveis_adicionar')->count()){
            Permissao::create([
                    'nome'=>'imoveis_adicionar',
                    'descricao'=>'Adicionar imóveis.'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','imoveis_adicionar')->first();
            $permissao->update([
                    'nome'=>'imoveis_adicionar',
                    'descricao'=>'Adicionar imóveis.'
                ]);
        }
        if(!Permissao::where('nome','=','imoveis_editar')->count()){
            Permissao::create([
                    'nome'=>'imoveis_editar',
                    'descricao'=>'Atualizar imóveis cadastrados'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','imoveis_editar')->first();
            $permissao->update([
                    'nome'=>'imoveis_editar',
                    'descricao'=>'Atualizar imóveis cadastrados'
                ]);
        }

        if(!Permissao::where('nome','=','imoveis_excluir')->count()){
            Permissao::create([
                    'nome'=>'imoveis_excluir',
                    'descricao'=>'Excluir imóveis cadastrados'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','imoveis_excluir')->first();
            $permissao->update([
                    'nome'=>'imoveis_excluir',
                    'descricao'=>'Excluir imóveis cadastrados'
                ]);
        }

        if(!Permissao::where('nome','=','imoveis_foto')->count()){
            Permissao::create([
                    'nome'=>'imoveis_foto',
                    'descricao'=>'Inserir fotos do imóvel'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','imoveis_foto')->first();
            $permissao->update([
                    'nome'=>'imoveis_foto',
                    'descricao'=>'Inserir fotos do imóvel'
                ]);
        }

        
        if(!Permissao::where('nome','=','slides_listar')->count()){
            Permissao::create([
                    'nome'=>'slides_listar',
                    'descricao'=>'Listar os slides cadastrados'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','slides_listar')->first();
            $permissao->update([
                    'nome'=>'slides_listar',
                    'descricao'=>'Listar os slides cadastrados'
                ]);
        }

         if(!Permissao::where('nome','=','slides_adicionar')->count()){
            Permissao::create([
                    'nome'=>'slides_adicionar',
                    'descricao'=>'Adicionar slides.'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','slides_adicionar')->first();
            $permissao->update([
                    'nome'=>'slides_adicionar',
                    'descricao'=>'Adicionar slides.'
                ]);
        }

         if(!Permissao::where('nome','=','slides_editar')->count()){
            Permissao::create([
                    'nome'=>'slides_editar',
                    'descricao'=>'Editar os slides cadastrados'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','slides_editar')->first();
            $permissao->update([
                    'nome'=>'slides_editar',
                    'descricao'=>'Editar os slides cadastrados'
                ]);
        }

         if(!Permissao::where('nome','=','slides_excluir')->count()){
            Permissao::create([
                    'nome'=>'slides_excluir',
                    'descricao'=>'Excluir slides cadastrados'
                ]);
        }else{
            $permissao = Permissao::where('nome','=','slides_excluir')->first();
            $permissao->update([
                    'nome'=>'slides_excluir',
                    'descricao'=>'Excluir slides cadastrados'
                ]);
        }
    }
}
