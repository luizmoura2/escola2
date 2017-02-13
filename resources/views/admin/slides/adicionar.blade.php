@extends('layouts.app')
@section('content')

	<div class="container">
	<h4 align="center">Adicionar Slide</h4>
		<div class="row">
			<nav>
			    <div class="nav-wrapper teal">
			      <div class="col s12">
			      	<a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
			        <a href="{{ route('admin.slides')}}" class="breadcrumb">Lista de Slides</a>	
			        <span class="breadcrumb">Adicionar Slide</span>		       
			      </div>
			    </div>
		  	</nav>		
		</div>
		<div class="row">
			<form  method="post" action="{{ route('admin.slides.salvar')}}" enctype="multipart/form-data">
				{{ csrf_field() }}
				@include('admin.slides._form')
				
				<div class="row">
					<button class="btn teal">Adicionar</button>
				</div>
			</form>
			
		</div>
	</div>
@endsection