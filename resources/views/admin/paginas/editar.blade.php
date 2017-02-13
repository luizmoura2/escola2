@extends('layouts.app')
@section('content')

	<div class="container">
		<h5 align="center">Editar Página</h5>
		<div class="row">
			<nav>
			    <div class="nav-wrapper teal">
			      <div class="col s12">
			        <a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
			        <a href="{{ route('admin.paginas')}}" class="breadcrumb">Lista de Páginas</a>
			        <span class="breadcrumb">Editar Página</span>		       
			      </div> 
			    </div>
		  	</nav>		
		</div>
		<div class="row">
			<form  method="post" action="{{ route('admin.pagina.atualizar')}}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="put">

					@include('admin.paginas._form')

				<div class="row">
					<button class="btn teal"><i class="material-icons left">library_add</i>Atualizar</button>
				</div>
			</form>
			
		</div>
	</div>
@endsection