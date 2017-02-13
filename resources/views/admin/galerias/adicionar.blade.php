@extends('layouts.app')
@section('content')

	<div class="container">
	<h4 align="center">Adicionar Imagem</h4>
		<div class="row">
			<nav>
			    <div class="nav-wrapper teal">
			      <div class="col s12">
			      	<a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
			        <a href="{{ route('admin.imoveis')}}" class="breadcrumb">Lista de Imóveis</a>	
			        <a href="{{ route('admin.galerias', $registro['imovel_id'])}}" class="breadcrumb">Galeria de Imagens</a>			        
			        <span class="breadcrumb">Adicionar Imagem</span>		       
			      </div>
			    </div>
		  	</nav>		
		</div>
		<div class="row">
			<form  method="post" action="{{ route('admin.galeria.salvar')}}" enctype="multipart/form-data">
				{{ csrf_field() }}
				@include('admin.galerias._form')
				
				<div class="row">
					<button class="btn teal">Adicionar</button>
				</div>
			</form>
			
		</div>
	</div>
@endsection