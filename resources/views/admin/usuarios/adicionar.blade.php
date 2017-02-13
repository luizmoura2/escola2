@extends('layouts.app')
@section('content')

	<div class="container">
		<h2 align="center">Adicionar Usuário</h2>
		<div class="row">
			<nav>
			    <div class="nav-wrapper teal">
			      <div class="col s12">
			        <a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
			        <a href="{{ route('admin.usuarios')}}" class="breadcrumb">Lista de Usuários</a>
			        <span class="breadcrumb">Adicionar Usuário</span>		       
			      </div>
			    </div>
		  	</nav>		
		</div>
		<div class="row">
			<form  method="post" action="{{ route('admin.usuarios.salvar')}}">
				{{ csrf_field() }}
				@include('admin.pessoa._form')
				@include('admin.usuarios._form')
				@include('admin.endereco._form')

				<div class="row">
					<button class="btn teal">Adicionar</button>
				</div>
			</form>
			
		</div>
	</div>
@endsection