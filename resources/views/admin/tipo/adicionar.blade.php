@extends('layouts.app')
@section('content')

	<div class="container">Tipo</h2>
		<div class="row">
			<nav>
			    <div class="nav-wrapper teal">
			      <div class="col s12">
			        <a href="{{ route('admin.principal')}}" class="breadcrumb">Inicio</a>
			        <a href="{{ route('admin.tipos')}}" class="breadcrumb">Lista de Tipos</a>
			        <span class="breadcrumb">Adicionar Tipo</span>		       
			      </div>
			    </div>
		  	</nav>		
		</div>
		<div class="row">
			<form  method="post" action="{{ route('admin.tipo.salvar')}}">
				{{ csrf_field() }}
				@include('admin.tipo._form')
				
				<div class="row">
					<button class="btn teal">Adicionar</button>
				</div>
			</form>
			
		</div>
	</div>
@endsection