@extends('layouts.app')
@section('content')

	<div class="container">
		<h4 align="center">Editar Imóvel</h4>
		<div class="row">
			<nav>
			    <div class="nav-wrapper teal">
			      <div class="col s12">
			        <a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
			        <a href="{{ route('admin.imoveis')}}" class="breadcrumb">Lista de Imóveis</a>
			        <span class="breadcrumb">Editar Imovel</span>		       
			      </div>
			    </div>
		  	</nav>		
		</div>
		<div class="row">
			<form  method="post" action="{{ route('admin.imovel.atualizar')}}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put">
				@include('admin.imoveis._form')				

				<div class="row">
					<button class="btn teal">Atualizar</button>
				</div>
				
			</form>
			
		</div>
	</div>
@endsection