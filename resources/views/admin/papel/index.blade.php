@extends('layouts.app')
@section('content')

<div class="container">
	<h5 align="center">Lista de Papéis</h5>
	<div class="row">
		<nav>
		    <div class="nav-wrapper teal">
		      <div class="col s12">
		        <a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
		        <span class="breadcrumb">Lista de Papéis</span>
		       
		      </div>
		    </div>
	  	</nav>		
	</div>
	<div class="row">
		<table>
			<thead>
				<th>Id</th>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Ação</th>
			</thead>
			<tbody>

			@foreach ($registros as $registro)
				<tr><td>{{ $registro->id }}</td>
					<td>{{ $registro->nome }}</td>
					<td>{{ $registro->descricao }}</td>

					<td>
					@if($registro->nome != 'Master')
						@can('papel_editar')
						<a title="Editar os dados de '{{ $registro->name }}'" href="{{ route('admin.papel.editar', $registro->id )}}"><i class="material-icons left">mode_edit</i></a>
						@endcan
						@can('papel_atribuir')
						<a title="Acrescentar permissao '{{ $registro->name }}'" href="{{ route('admin.papel.permissao', $registro->id )}}"><i class="material-icons left">play_for_work</i></a>
						@endcan
						@can('papel_deletar')
						<a title="Excluir  os dados de '{{ $registro->name }}'" href="javascript: if (confirm('Excluir o registro do papel: {{$registro->name}}')){ window.location.href= '{{ route('admin.papel.delete', $registro->id )}}' }"><i class="material-icons left">delete</i></a>
						@endcan
					@else	
					 <span><i class="material-icons center">warning</i></span>
					@endif
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		@can('papel_adicionar')
		<a title="Adicionar registro do papel."  href="{{ route('admin.papel.adicionar') }}"><i class="material-icons left">library_add</i>
		@endcan</a>
	</div>
</div>
@endsection
