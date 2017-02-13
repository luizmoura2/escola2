<div class="input-field">
	<input type="hidden" name="endereco_id" value="{{ isset($endereco['id']) ? $endereco['id'] : '' }}">
</div>
<div class="input-field col s12 m5">
	<input id="logradouro" class="validade" type="text" name="logradouro" maxlength="101" value="{{ isset($endereco['logradouro']) ? $endereco['logradouro'] : '' }}"/>
	<label for="logradouro">Logradouro</label>
</div>
<div class="input-field col s12 m2">
	<input id="bairro" class="validade" type="text" name="bairro" maxlength="100" value="{{ isset($endereco['bairro']) ? $endereco['bairro'] : '' }}"/>
	<label for="bairro">Bairro</label>
</div>
<div class="input-field col s12 m5">
	<input id="complemento" class="validade" type="text" maxlength="200" name="complemento" value="{{ isset($endereco['complemento']) ? $endereco['complemento'] : '' }}"/>
	<label for="complemento">Complemento</label>
</div>
<div class="input-field col s12 m3">
	<input id="numero" class="validade" type="text" name="numero" value="{{ isset($endereco['numero']) ? $endereco['numero'] : '' }}"/>
	<label for="numero">Número</label>
</div>
<div class="input-field  col s12 m3">

	<input id="telefone" class="validade" type="text" name="telefone" maxlength="20" value="{{ isset($endereco['telefone']) ? $endereco['telefone'] : '' }}"/>
	<label for="telefone">Telefone</label>
</div>
<div class="input-field  col s12 m6">
	<select id="cidade_addr" name="cidade_id_adress">
	@foreach($cidades as $cidade)		
		<option value="{{$cidade->id}}" {{ isset($endereco['cidade_id']) && $endereco['cidade_id'] == $cidade->id ? 'selected' :  '' }}>{{ $cidade->nome_municipio }}</option>
	@endforeach
	</select>
	<label for="cidade_addr">Cidade</label>
</div>