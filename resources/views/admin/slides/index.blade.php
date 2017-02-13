@extends('layouts.app')
@section('content')

<div class="container">
	<h5 align="center">Lista de Slides</h5>
	<div class="row">
		<nav>
		    <div class="nav-wrapper teal">
		      <div class="col s12">
		      	<a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>		       
		        <span class="breadcrumb">Lista de Slides</span>		       
		      </div>
		    </div>
	  	</nav>		
	</div>
	<div class="row">
		<table>
			<thead>
				<th>Ordem</th>
				<th>Titulo</th>
				<th>Descrição</th>				
				<th>Publicado</th>
				<th>Imagem</th>					
				<th>Ação</th>
			</thead>
			<tbody>

			@foreach ($registros as $registro)
				<tr><td>{{ $registro->ordem }}</td>
					<td>{{ $registro->titulo }}</td>
					<td>{{ $registro->descricao }}</td>
					<td>{{ $registro->publicado }}</td>
					<td><img src="{{ asset( $registro->imagem  )}}" width="100"></td>					
					<td>
					@can('slides_editar')
					<a title="Editar os dados de '{{ $registro->titulo }}'" href="{{ route('admin.slide.editar', $registro->id)}}"><i class="material-icons left">mode_edit</i></a>
					@endcan
					@can('slides_excluir')
					<a title="Excluir  os dados de '{{ $registro->titulo }}'" href="javascript: if (confirm('Excluir o registro da galeria: {{$registro->titulo}}')){ window.location.href= '{{ route('admin.slide.delete', $registro->id)}}' }"><i class="material-icons left">delete</i></a>
					@endcan
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		@can('slides_adicionar')
		<a title="Adicionar registro de Imóvel."  href="{{ route('admin.slide.adicionar') }}"><i class="material-icons left">library_add</i></a>
		@endcan
	</div>
</div>
@endsection
