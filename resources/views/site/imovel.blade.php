@extends('layouts.site')

@section('content')
<div class="container">
	<div class="row section">
		<h3 align="center">Imóvel</h3>
		<div class="divider">
			
		</div>
		<div class="row section">
			<div class="col s12 m8">
				<div class="row">
					<div class="slider">
						<ul class="slides">
							@foreach($galeria as $slide)
							<li>
								<img src="{{ asset($slide->imagem)}}">
								<div class="caption {{ $animacao[rand(0,2)]}}">
									<h3>{{ $slide->titulo }}</h3>
									<h5>{{ $slide->descricao }}</h5>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="row center-align">
						<button onclick="sliderPrev()" class="btn teal">Anterior</button>
						<button onclick="sliderNext()" class="btn teal">Próximo</button>
					</div>
				</div>
			</div>
			<div class="col s12 m4">
				<h4>{{ $imovel->titulo }}</h4>
				<blockquote>
					{{ $imovel->descricao }}
				</blockquote>
				<p><b>Status:</b> {{ $imovel->status }}</p>
				<p><b>Codigo:</b> {{ $imovel->id }}</p>
				<p><b>Tipo:</b> {{ $imovel->tipo->titulo }}</p>
				<p><b>Cidade:</b> {{ $imovel->cidades->nome_municipio }}</p>
				<p><b>Endereço:</b> {{ $imovel->endereco }}</p>
				<p><b>Valor:</b> R$ {{ number_format($imovel->valor, 2, ",", "." )}}</p>
				<a class="btn deep-orange darken-1" href="{{ route('site.contato') }}">Contato</a>
			</div>
		</div>
	</div>
</div>
@endsection