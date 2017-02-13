<div class="input-field">
	<input type="hidden" name="id" value="{{ isset($registro['id']) ? $registro['id'] : '' }}">
</div>
<div class="input-field col s12 m6">
	<input id="tipo" type="text" name="nome_municipio" maxlength="100" value="{{ isset($registro['nome_municipio']) ? $registro['nome_municipio'] : '' }}">
	<label for="tipo">Nome Cidade</label>
</div>
<div class="input-field  col s6 m2">
	<select name="uf_id">
	@foreach($ufs as $uf)
		<option value="{{$uf->id}}" {{ isset($registro['uf_id']) && $registro['uf_id'] == $uf->id ? 'selected' : ''}} >{{ $uf->sigla }}</option>
	@endforeach
	</select>
	<label>Uf</label>
</div>

<div class="input-field col s6 m2">
	<input class="validate" type="text" name="cep_inicial" maxlength="10" value="{{ isset($registro['cep_inicial']) ? $registro['cep_inicial'] : '' }}"/>
	<label>Cep inicio</label>
</div>
<div class="input-field col s6 m2">
	<input class="validade" type="text" name="cep_final" maxlength="10" value="{{ isset($registro['cep_final']) ? $registro['cep_final'] : '' }}"></input>
	<label>Cep final</label>
</div>
<div class="input-field col s6 m3">
	<input class="validade" type="text" name="ddd1" maxlength="3" value="{{ isset($registro['ddd1']) ? $registro['ddd1'] : '' }}"></input>
	<label>DDD 1</label>
</div>
<div class="input-field col s6 m3">
	<input class="validade" type="text" name="ddd2" maxlength="3" value="{{ isset($registro['ddd2']) ? $registro['ddd2'] : '' }}"></input>
	<label>DDD 2</label>
</div>

