@extends('layouts.app')
@section('content')

<div class="container">
	<h5 align="center">Galeria de Imagens</h5>
	<div class="row">
		<nav>
		    <div class="nav-wrapper teal">
		      <div class="col s12">
		      	<a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
		        <a href="{{ route('admin.imoveis')}}" class="breadcrumb">Lista de Imóveis</a>
		        <span class="breadcrumb">Lista de Imagens</span>		       
		      </div>
		    </div>
	  	</nav>		
	</div>
	<div class="row">
		<table>
			<thead>
				<th>Id</th>
				<th>Titulo</th>
				<th>Descrição</th>
				<th>Imagem</th>
				<th>Ordem</th>					
				<th>Ação</th>
			</thead>
			<tbody>

			@foreach ($registros as $registro)
				<tr><td>{{ $registro->id }}</td>
					<td>{{ $registro->titulo }}</td>
					<td>{{ $registro->descricao }}</td>
					<td>{{ $registro->ordem }}</td>
					<td><img src="{{ asset( $registro->imagem  )}}" width="100"></td>
					<td>{{ $registro->publicar }}</td>
					<td><a title="Editar os dados de '{{ $registro->titulo }}'" href="{{ route('admin.galeria.editar', $registro->id )}}"><i class="material-icons left">mode_edit</i></a>
					    <a title="Excluir  os dados de '{{ $registro->titulo }}'" href="javascript: if (confirm('Excluir o registro da galeria: {{$registro->titulo}}')){ window.location.href= '{{ route('admin.galeria.delete', $registro->id )}}' }"><i class="material-icons left">delete</i></a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		<a title="Adicionar registro de Imóvel."  href="{{ route('admin.galeria.adicionar', $imovel->id) }}"><i class="material-icons left">library_add</i></a>
	</div>
</div>
@endsection
