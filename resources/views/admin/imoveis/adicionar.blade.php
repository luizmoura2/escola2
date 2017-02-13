@extends('layouts.app')
@section('content')

	<div class="container">
	<h4 align="center">Adicionar Imóvel</h4>
		<div class="row">
			<nav>
			    <div class="nav-wrapper teal">
			      <div class="col s12">
			        <a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
			        <a href="{{ route('admin.cidades')}}" class="breadcrumb">Lista de Imóveis</a>
			        <span class="breadcrumb">Adicionar Imóvel</span>		       
			      </div>
			    </div>
		  	</nav>		
		</div>
		<div class="row">
			<form  method="post" action="{{ route('admin.imovel.salvar')}}" enctype="multipart/form-data">
				{{ csrf_field() }}
				@include('admin.imoveis._form')
				
				<div class="row">
					<button class="btn teal">Adicionar</button>
				</div>
			</form>
			
		</div>
	</div>
@endsection