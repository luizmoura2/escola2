@extends('layouts.site')

@section('content')
<div class="container">
	<div class="row section">
		<h3 align="center">Sobre</h3>
		<div class="divider">
			
		</div>
		<div class="row section">
			<div class="col s12 m8">
			@if (isset($pagina->mapa))
				<div class="video-cantainer">
					{!! $pagina->mapa !!}
				</div>
			@else
				<img class="responsive-img" src="{{ asset($pagina->imagem) }}">
			@endif
			</div>
			<div class="col s12 m4">
				<h4>{{$pagina->titulo}}</h4>
				<blockquote>
					{{$pagina->texto}}
				</blockquote>
				<p>{{$pagina->descricao}}</p>
			</div>
		</div>
	</div>
</div>
@endsection