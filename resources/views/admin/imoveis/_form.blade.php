<div class="input-field">
	<input type="hidden" name="id" value="{{ isset($registro['id']) ? $registro['id'] : '' }}">
</div>
<div class="input-field  col s6 m3">
	<select id="tipo" name="tipo_id">	
	@foreach($tipos as $tipo)
		<option value="{{$tipo->id}}" {{ isset($registro['tipo_id']) && $registro['tipo_id'] == $tipo->id ? 'selected' : ''}} >{{ $tipo->titulo}}</option>
	@endforeach
	</select>
	<label for="tipo">Tipo Imovel</label>
</div>
<div class="input-field  col s6 m5">
	<select id="cidade" name="cidade_id">
	@foreach($cidades as $cidade)
		<option value="{{$cidade->id}}" {{ isset($registro['cidade_id']) && $registro['cidade_id'] == $cidade->id ? 'selected' : ''}} >{{ $cidade->nome_municipio }}</option>
	@endforeach
	</select>
	<label for="cidade">Cidade</label>
</div>
<div class="input-field col s6 m4">
	<input id="titulo" class="validate" type="text" name="titulo"  value="{{ isset($registro['titulo']) ? $registro['titulo'] : '' }}"/>
	<label for="titulo">Titulo</label>
</div>

<div class="input-field col s6 m6">
	<input class="validade" type="text" name="descricao" value="{{ isset($registro['descricao']) ? $registro['descricao'] : '' }}"></input>
	<label>Descrição</label>
</div>
<div class="input-field  col s6 m2">
	<select id="status" name="status">	
		<option value="vende" {{ isset($registro['status']) && $registro['status'] == 'vende'? 'selected' : ''}} >Vende</option>
		<option value="aluga" {{ isset($registro['status']) && $registro['status'] == 'aluga'? 'selected' : ''}} >Aluga</option>
	</select>
	<label for="status">Status</label>
</div>
<div class="input-field col s6 m4">
	<input id="endereco" class="validade" type="text" name="endereco" value="{{ isset($registro['endereco']) ? $registro['endereco'] : '' }}"></input>
	<label for="endereco">Endereço</label>
</div>
<div class="input-field col s3 m3">
	<select name="dormitorio">
		<option {{$campo['dormitorio'][0]}} value="0">Todos</option>
		<option {{$campo['dormitorio'][1]}} value="1">1</opion>
		<option {{$campo['dormitorio'][2]}} value="2">2</option>			
		<option {{$campo['dormitorio'][3]}} value="3">3</option>
		<option {{$campo['dormitorio'][4]}} value="4">Mais...</option>						
	</select>
	<label>Dormitórios</label>
</div>
<div class="input-field col s6 m3">
	<input id="cep" class="validade" type="text" name="cep" value="{{ isset($registro['cep']) ? $registro['cep'] : '' }}"></input>
	<label for="cep">Cep</label>
</div>
<div class="input-field col s6 m3">
	<input id="valor" class="validade" type="text" name="valor" value="{{ isset($registro['valor']) ? $registro['valor'] : '' }}"></input>
	<label for="valor">Valor</label>
</div>
<div class="input-field  col s6 m3">
	<select id="publicar" name="publicar">	
		<option value="sim" {{ isset($registro['publicar']) && $registro['publicar'] == 'sim'? 'selected' : ''}} >Sim</option>
		<option value="nao" {{ isset($registro['publicar']) && $registro['publicar'] == 'nao'? 'selected' : ''}} >Não</option>
	</select>
	<label for="publicar">Publicar</label>
</div>

<div class="input-field  col s12 m12">
	<textarea id="mapa" name="mapa" class="materialize-textarea">
			{{ isset($registro->mapa) ? $registro->mapa : '' }}
	</textarea>
    <label for="mapa">Mapa</label>
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
			@if(isset($registro->imagem))
			<img src="{{asset($registro->imagem)}}" width="120">
			@endif
		</div>
	</div>
</div>               