@extends('layouts.app')
@section('content')

<div class="container">
	<h5 align="center">Lista de Tipos</h5>
	<div class="row">
		<nav>
		    <div class="nav-wrapper teal">
		      <div class="col s12">
		        <a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
		        <span class="breadcrumb">Lista de Tipos</span>
		       
		      </div>
		    </div>
	  	</nav>		
	</div>
	<div class="row">
		<table>
			<thead>
				<th>Id</th>
				<th>Titulo</th>				
				<th>Ação</th>
			</thead>
			<tbody>
			@foreach ($registros as $registro)
				<tr><td>{{ $registro->id }}</td>
					<td>{{ $registro->titulo }}</td>
					@can('tipos_editar')					
					<td><a title="Editar os dados de tipo'{{ $registro->titulo }}'" href="{{ route('admin.tipo.editar', $registro->id )}}"><i class="material-icons left">mode_edit</i></a>
					@endcan
					@can('tipos_excluir')
					    <a title="Excluir  os dados de tipo '{{ $registro->titulo }}'" href="javascript: if (confirm('Excluir o registro do usuario: {{$registro->titulo}}')){ window.location.href= '{{ route('admin.tipo.delete', $registro->id )}}' }"><i class="material-icons left">delete</i></a>
					@endcan
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		@can('tipos_adicionar')
		<a title="Adicionar registro de tipo de imóvel."  href="{{ route('admin.tipo.adicionar') }}"><i class="material-icons left">library_add</i></a>
		@endcan
	</div>
</div>
@endsection
