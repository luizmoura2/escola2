@extends('layouts.app')
@section('content')

	<div class="container">
		<h4 align="center">Editar Usuário</h4>
		<div class="row">
			<nav>
			    <div class="nav-wrapper teal">
			      <div class="col s12">
			        <a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
			        <a href="{{ route('admin.usuarios')}}" class="breadcrumb">Lista de Usuários</a>
			        <span class="breadcrumb">Editar Usuário</span>		       
			      </div>
			    </div>
		  	</nav>		
		</div>
		<div class="row">
			<form  method="post" action="{{ route('admin.usuarios.atualizar')}}">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put">
				@include('admin.pessoa._form')
				@include('admin.usuarios._form')
				@include('admin.endereco._form')

				<div class="row">
					<button class="btn teal">Atualizar</button>
				</div>
			</form>
			
		</div>
	</div>
@endsection