@extends('layouts.app')
@section('content')

<div class="container">
	<h5 >Lista de Papeis para: {{$usuario->name}}</h5>
	<div class="row">
		<nav>
		    <div class="nav-wrapper teal">
		      <div class="col s12">
		        <a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
		        <a href="{{ route('admin.usuarios')}}" class="breadcrumb">Lista de Usuarios</a>
		        <span class="breadcrumb">Lista Papeis</span>
		       
		      </div>
		    </div>
	  	</nav>		
	</div>
	<div class="row">
		<form  action="{{ route('admin.usuarios.papel.salvar') }}" method="post">
			{{ csrf_field() }}
			<div class="input-field" >
				<input type="hidden" name="id" value="{{$usuario->id}}">
			</div>
			<div class="input-field  col s12 m5">
				<select id="papel" name="papel_id" >
					@foreach($papeis as $papel)
						<option value="{{$papel->id}}">{{ $papel->nome }}</option>
					@endforeach
				</select>
				<label for="papel">Papel</label>
			</div>
			<button class="" title="Atribuir papel!"><i class="material-icons left">input</i></button>
		</form>
	</div>
	<div class="row">
		
		<table>
			<thead>				
				<th>Papel</th>
				<th>Descrição</th>				
				<th>Ação</th>
			</thead>
			<tbody>
			@foreach ($usuario->papeis as $papel)
				<tr><td>{{ $papel->nome }}</td>
					<td>{{ $papel->descricao }}</td>
					<td><a title="Remover atribuição de papeis" href="javascript: if (confirm('Remoção: {{$papel->name}} do usuário?')){ window.location.href= '{{ route('admin.usuarios.papel.remover', [$usuario->id, $papel->id]) }}' }" ><i class="material-icons left">delete</i></a>
					</td>					
				</tr>
			@endforeach
			</tbody>
		</table>		
</div>
@endsection
