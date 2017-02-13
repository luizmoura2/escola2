@extends('layouts.app')
@section('content')

	<div class="container">
		<h5 align="center">Adicionar Papel</h5>
		<div class="row">
			<nav>
			    <div class="nav-wrapper teal">
			      <div class="col s12">
			        <a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
			        <a href="{{ route('admin.papel')}}" class="breadcrumb">Lista de Papéis</a>
			        <span class="breadcrumb">Adicionar Papel</span>		       
			      </div>
			    </div>
		  	</nav>		
		</div>
		<div class="row">
			<form  method="post" action="{{ route('admin.papel.salvar')}}">
				{{ csrf_field() }}
				@include('admin.papel._form')
				
				<div class="row">
					<button class="btn teal">Adicionar</button>
				</div>
			</form>
			
		</div>
	</div>
@endsection