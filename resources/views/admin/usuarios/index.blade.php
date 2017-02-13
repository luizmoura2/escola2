@extends('layouts.app')
@section('content')

<div class="container">
	<h5 align="center">Lista de Usuários</h5>
	<div class="row">
		<nav>
		    <div class="nav-wrapper teal">
		      <div class="col s12">
		        <a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
		        <span class="breadcrumb">Lista de Usuários</span>
		       
		      </div>
		    </div>
	  	</nav>		
	</div>
	<div class="row">
		<table>
			<thead>
				<th>Id</th>
				<th>Nome</th>
				<th>E-Mail</th>
				<th>Perfil</th>
				<th>Cargo</th>
				<th>Órgão</th>
				<th>Ação</th>
			</thead>
			<tbody>
			@foreach ($usuarios as $user)
				<tr><td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->perfil_sis }}</td>
					<td>{{ $user->cargo}}</td>
					<td>{{ $user->orgao }}</td>
					
					<td>	
					@can('usuario_editar')
						<a title="Editar os dados de '{{ $user->name }}'" href="{{ route('admin.usuarios.editar', $user->id )}}"><i class="material-icons left">mode_edit</i></a>
					@endcan
					@can('papel_atribuir')
						<a title="Atribuir papel para '{{ $user->name }}'" href="{{ route('admin.usuarios.papel', $user->id )}}"><i class="material-icons left">input</i></a>
					@endcan
					@can('usuario_deletar')
						<a title="Excluir  os dados de '{{ $user->name }}'" href="javascript: if (confirm('Excluir o registro do usuario: {{$user->name}}')){ window.location.href= '{{ route('admin.usuarios.delete', $user->id )}}' }"><i class="material-icons left">delete</i></a>
					@endcan
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		@can('usuario_adicionar')
		<a title="Adicionar registro de usuário."  href="{{ route('admin.usuarios.adicionar', $user->id) }}"><i class="material-icons left">library_add</i></a>
		@endcan
	</div>
</div>
@endsection
