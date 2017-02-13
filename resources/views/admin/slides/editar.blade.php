@extends('layouts.app')
@section('content')

	<div class="container">
		<h4 align="center">Editar Slide</h4>
		<div class="row">
			<nav>
			    <div class="nav-wrapper teal">
			      <div class="col s12">
			      	<a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
			        <a href="{{ route('admin.slides')}}" class="breadcrumb">Lista de Slides</a>
			        <span class="breadcrumb">Editar Slide</span>		       
			      </div>
			    </div>
		  	</nav>		
		</div>
		<div class="row">
			<form  method="post" action="{{ route('admin.slide.atualizar')}}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put">
				@include('admin.slides._form')				

				<div class="row">
					<button class="btn teal">Atualizar</button>
				</div>
				
			</form>
			
		</div>
	</div>
@endsection