@extends('layouts.app')
@section('content')

<div class="container">
	<h5 align="center">Lista de Cidades</h5>
	<div class="row">
		<nav>
		    <div class="nav-wrapper teal">
		      <div class="col s12">
		        <a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
		        <span class="breadcrumb">Lista de Cidades</span>
		       
		      </div>
		    </div>
	  	</nav>		
	</div>
	<div class="row">
		<table>
			<thead>
				<th>Id</th>
				<th>Nome</th>
				<th>Uf</th>
				<th>Cep final</th>
				<th>Cep inicio</th>
				<th>DDD</th>
				<th>DDD</th>
				<th>Ação</th>
			</thead>
			<tbody>

			@foreach ($registros as $registro)
				<tr><td>{{ $registro->id }}</td>
					<td>{{ $registro->nome_municipio }}</td>
					<td>{{ $registro->uf->sigla }}</td>
					<td>{{ $registro->cep_final }}</td>
					<td>{{ $registro->cep_inicial}}</td>
					<td>{{ $registro->ddd1 }}</td>
					<td>{{ $registro->ddd2 }}</td>
					@can('cidades_editar')
					<td><a title="Editar os dados de '{{ $registro->name }}'" href="{{ route('admin.cidade.editar', $registro->id )}}"><i class="material-icons left">mode_edit</i></a>
					@endcan
					@can('cidades_excluir')    <a title="Excluir  os dados de '{{ $registro->name }}'" href="javascript: if (confirm('Excluir o registro do usuario: {{$registro->name}}')){ window.location.href= '{{ route('admin.cidade.delete', $registro->id )}}' }"><i class="material-icons left">delete</i></a>
					@endcan
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		@can('cidades_adicionar')
		<a title="Adicionar registro de Cidade."  href="{{ route('admin.cidade.adicionar') }}"><i class="material-icons left">library_add</i></a>
		@endcan
	</div>
</div>
<div class="row" align="center">
	{{$registros->links()}}
</div>
@endsection
