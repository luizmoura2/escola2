@extends('layouts.app')
@section('content')

	<div class="container">Lista de Cidades</h2>
		<div class="row">
			<nav>
			    <div class="nav-wrapper teal">
			      <div class="col s12">
			        <a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
			        <a href="{{ route('admin.cidades')}}" class="breadcrumb">Lista de Cidades</a>
			        <span class="breadcrumb">Adicionar Cidade</span>		       
			      </div>
			    </div>
		  	</nav>		
		</div>
		<div class="row">
			<form  method="post" action="{{ route('admin.cidade.salvar')}}">
				{{ csrf_field() }}
				@include('admin.cidade._form')
				
				<div class="row">
					<button class="btn teal">Adicionar</button>
				</div>
			</form>
			
		</div>
	</div>
@endsection