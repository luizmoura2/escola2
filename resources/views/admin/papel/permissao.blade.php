@extends('layouts.app')
@section('content')

<div class="container">
	<h5 >Lista de Permissão para: {{$papel->nome}}</h5>
	<div class="row">
		<nav>
			    <div class="nav-wrapper teal">
			      <div class="col s12">
			        <a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
			        <a href="{{ route('admin.papel')}}" class="breadcrumb">Lista de Papéis</a>
			        <span class="breadcrumb">Listar Permissões</span>		       
			      </div>
			    </div>
		  	</nav>		
	</div>
	<div class="row">
		<form  action="{{ route('admin.papel.permissao.salvar') }}" method="post">
			{{ csrf_field() }}
			<div class="input-field" >
				<input type="hidden" name="id" value="{{$papel->id}}">
			</div>
			<div class="input-field  col s12 m8">
				<select id="permissao" name="permissao_id" >
					@foreach($permissaos as $permissao)
						<option value="{{$permissao->id}}">{{ $permissao->descricao.'   ('.$permissao->nome.')'}}</option>
					@endforeach
				</select>
				<label for="permisao">Papel</label>
			</div>
			<button class="" title="Atribuir permisao!"><i class="material-icons left">input</i></button>
		</form>
	</div>
	<div class="row">
		
		<table>
			<thead>				
				<th>Permissão</th>
				<th>Descrição</th>				
				<th>Ação</th>
			</thead>
			<tbody>
			@foreach ($papel->permissoes as $permissao)
				<tr><td>{{ $permissao->nome }}</td>
					<td>{{ $permissao->descricao }}</td>
					<td><a title="Remover atribuição de papeis" href="javascript: if (confirm('Remoção: {{$permissao->name}} do usuário?')){ window.location.href= '{{ route('admin.papel.permissao.remover', [$papel->id, $permissao->id]) }}' }" ><i class="material-icons left">delete</i></a>
					</td>					
				</tr>
			@endforeach
			</tbody>
		</table>		
</div>
@endsection
