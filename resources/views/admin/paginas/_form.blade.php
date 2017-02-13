<div class="input-field">
	<input type="hidden" name="id" value="{{ isset($pagina->id) ? $pagina->id : '' }}">
</div>
<div class="input-field col s12 m6">
	<input class="validate" type="text" name="titulo"  value="{{ isset($pagina->titulo) ? $pagina->titulo : '' }}"/>
	<label>Titulo</label>
</div>
<div class="input-field col s12 m6">
	<input class="validate" type="text" name="descricao" value="{{ isset($pagina->descricao) ? $pagina->descricao : '' }}"></input>
	<label>Descrição</label>
</div>
<div class="input-field col s12 m12">
	<input class="validate" type="text" name="texto" value="{{ isset($pagina->texto) ? $pagina->texto : '' }}"></input>
	<label>Textoo</label>
</div>
@if(isset($pagina->email))
	<div class="input-field  col s12 m4">
		<input id="email" name="email" type="email" class="validate" value="{{ isset($pagina->email) ? $pagina->email : '' }}">
	    <label for="email" data-error="wrong" data-success="right">Email</label>
	</div>
@endif
<div class="input-field  col s12 m12">
	<textarea id="mapa" name="mapa" class="materialize-textarea">
			{{ isset($pagina->mapa) ? $pagina->mapa : '' }}
	</textarea>
    <label for="mapa">Mapa</label>
</div>

<div class="row">
	<div class="file-field input-field col s12 m6">
		<div class="btn">
			<span>Imagem<i class="material-icons left">picture_in_picture</i></span>
			<input type="file" name="imagem">
		</div>
		<div class="file-path-wrapper">
			<input type="text" class="file-path validate"/>
		</div>
		
		<div class="col s12 m6">
			@if(isset($pagina->imagem))
			<img src="{{asset($pagina->imagem)}}" width="120">
			@endif
		</div>
	</div>
</div>