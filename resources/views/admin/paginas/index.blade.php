@extends('layouts.app')
@section('content')

<div class="container">
	<h5 align="center">Lista de Páginas</h5>
	<div class="row">
		<nav>
		    <div class="nav-wrapper teal">
		      <div class="col s12">
		        <a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
		        <span class="breadcrumb">Lista de Paginas</span>
		       
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
				<th>Tipo</th>
				<th>Ação</th>
			</thead>
			<tbody>
			@foreach ($paginas as $pagina)
				<tr><td>{{ $pagina->id }}</td>
					<td>{{ $pagina->titulo }}</td>
					<td>{{ $pagina->descricao }}</td>
					<td>{{ $pagina->tipo }}</td>
					@can('pagina_editar')					
					<td><a title="Editar" href="{{ route('admin.pagina.editar', $pagina->id )}}"><i class="material-icons left">mode_edit</i></a>
					@endcan
					   
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		
	</div>
</div>
@endsection
