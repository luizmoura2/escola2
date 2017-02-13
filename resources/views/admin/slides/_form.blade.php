@if(isset($registro->imagem))
	<div class="input-field">
		<input type="hidden" name="id" value="{{ isset($registro['id']) ? $registro['id'] : '' }}">
	</div>
	<div class="input-field col s6 m6">
		<input id="titulo" class="validate" type="text" name="titulo"  value="{{ isset($registro['titulo']) ? $registro['titulo'] : '' }}"/>
		<label for="titulo">Titulo</label>
	</div>

	<div class="input-field col s6 m6">
		<input class="validade" type="text" name="descricao" value="{{ isset($registro['descricao']) ? $registro['descricao'] : '' }}"></input>
		<label for="descricao">Descrição</label>
	</div>
	<div class="input-field col s6 m6">
		<input class="validade" type="text" name="link" value="{{ isset($registro['link']) ? $registro['link'] : '' }}"></input>
		<label for="linkk">Links</label>
	</div>
	<div class="input-field col s6 m2">
		<input id="oredm" class="validade" type="text" name="ordem" value="{{ isset($registro['ordem']) ? $registro['ordem'] : '' }}"></input>
		<label for="ordem">Oredm</label>
	</div>

	<div class="input-field  col s6 m4">
		<select id="publicado" name="publicado">	
			<option value="sim" {{ isset($registro['publicado']) && $registro['publicado'] == 'sim'? 'selected' : ''}} >Sim</option>
			<option value="nao" {{ isset($registro['publicado']) && $registro['publicado'] == 'nao'? 'selected' : ''}} >Não</option>
		</select>
	<label for="publicado">Publicar</label>

	</div>
	<div class="row">
		<div class="file-field input-field col s12 m12">
			<div class="btn">
				<span>Imagem<i class="material-icons left">picture_in_picture</i></span>
				<input type="file" name="imagem">
			</div>
			<div class="file-path-wrapper">
				<input type="text" class="file-path validate"/>
			</div>
			
			<div class="col s12 m6">			
				<img src="{{asset($registro->imagem)}}" width="120">			
			</div>
		</div>
	</div> 
@else
<div class="row">
	<div class="file-field input-field col s12 m12">
		<div class="btn">
			<span>Imagem<i class="material-icons left">picture_in_picture</i></span>
			<input type="file" name="imagens[]" multiple="true">
		</div>
		<div class="file-path-wrapper">
			<input type="text" class="file-path validate"/>
		</div>
	</div>
</div> 
@endif              