@extends('layouts.app')
@section('content')

<div class="container">
	<h5 align="center">Lista de Imoveis</h5>
	<div class="row">
		<nav>
		    <div class="nav-wrapper teal">
		      <div class="col s12">
		        <a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
		        <span class="breadcrumb">Lista de Imóveis</span>
		       
		      </div>
		    </div>
	  	</nav>		
	</div>
	<div class="row">
		<table>
			<thead>
				<th>Id</th>
				<th>Titulo</th>
				<th>Status</th>
				<th>Cidade</th>
				<th>Dormitorios</th>
				<th>Valor</th>
				<th>Imagem</th>
				<th>Publicado</th>				
				<th>Ação</th>
			</thead>
			<tbody>

			@foreach ($registros as $registro)
				<tr><td>{{ $registro->id }}</td>
					<td>{{ $registro->titulo }}</td>
					<td>{{ $registro->status }}</td>
					<td>{{ $registro->cidades->nome_municipio }}</td>
					<td>{{ $registro->dormitorio }}</td>
					<td>{{ number_format($registro->valor, 2, ",", "." )}}</td>
					<td><img src="{{ asset( $registro->imagem  )}}" width="100"></td>
					<td>{{ $registro->publicar }}</td>
					<td>
					@can('imoveis_editar')
					<a title="Editar os dados de '{{ $registro->titulo }}'" href="{{ route('admin.imovel.editar', $registro->id )}}"><i class="material-icons left">mode_edit</i></a>
					@endcan
					@can('imoveis_excluir')    
					<a title="Excluir  os dados de '{{ $registro->titulo }}'" href="javascript: if (confirm('Excluir o registro do usuario: {{$registro->titulo}}')){ window.location.href= '{{ route('admin.imovel.delete', $registro->id )}}' }"><i class="material-icons left">delete</i></a>
					@endcan
					@can('imoveis_foto')
					<a title="Galeria  '{{ $registro->titulo }}'" href="{{ route('admin.galerias', $registro->id )}}"><i class="material-icons left">photo</i></a>
					@endcan
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		@can('imoveis_adicionar')
		<a title="Adicionar registro de Imóvel."  href="{{ route('admin.imovel.adicionar') }}"><i class="material-icons left">library_add</i></a>
		@endcan
	</div>
</div>
@endsection
