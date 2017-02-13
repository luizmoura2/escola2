@extends('layouts.app')
@section('content')

	<div class="container">
		<h4 align="center">Editar Cidade</h4>
		<div class="row">
			<nav>
			    <div class="nav-wrapper teal">
			      <div class="col s12">
			        <a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
			        <a href="{{ route('admin.cidades')}}" class="breadcrumb">Lista de Cidades</a>
			        <span class="breadcrumb">Editar Cidades</span>		       
			      </div>
			    </div>
		  	</nav>		
		</div>
		<div class="row">
			<form  method="post" action="{{ route('admin.cidade.atualizar')}}">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put">
				@include('admin.cidade._form')				

				<div class="row">
					<button class="btn teal">Atualizar</button>
				</div>
				
			</form>
			
		</div>
	</div>
@endsection