<div class="input-field">
	<input type="hidden" name="pessoa_id" value="{{ isset($pessoa['id']) ? $pessoa['id'] : '' }}">
</div>
<div class="input-field col s12 m6">
	<input id="nome" class="validade" type="text" name="nome" value="{{ isset($pessoa['nome']) ? $pessoa['nome'] : '' }}" />
	<label for="nome">Nome</label>
</div>
<div class="input-field">
	<input type="hidden" name="tipo_pessoa" value="USUARIO"/>
</div>
<div class="input-field col s12 m6">
	<input id="mae" class="validade" type="text" name="nome_mae" value="{{ isset($pessoa['nome_mae']) ? $pessoa['nome_mae'] : '' }}"/>
	<label for="mae">Mãe</label>
</div>
<div class="input-field col s12 m5">
	<input id="pai" class="validade" type="text" name="nome_pai" value="{{ isset($pessoa['nome_pai']) ? $pessoa['nome_pai'] : '' }}" />
	<label for="pai">Pai</label>
</div>
<div class="input-field  col s12 m2">
	<select id="sexo" name="sexo">	
		<option value="M" {{ isset($pessoa['sexo']) && $pessoa['sexo'] == 'M' ? 'selected' : ''}}>Masculino</option>
		<option value="F" {{ isset($pessoa['sexo']) && $pessoa['sexo'] == 'F' ? 'selected' : ''}}>Femenino</option>	
	</select>
	<label for="sexo">Sexo</label>
</div>
<div class="input-field  col s12 m3">
	<input id="cpf" class="validade" type="text" name="cpf" value="{{ isset($pessoa['cpf']) ? $pessoa['cpf'] : '' }}" />
	<label for="cpf">CPF</label>
</div>
<div class="input-field  col s12 m2">
	<input id="datanascimento" type="text" class="validade" name="data_nascimento" value="{{ isset($pessoa['data_nascimento']) ? $pessoa['data_nascimento'] : '' }}" />
	<label for="datanascimento">Data de Nasc.</label>
</div>
<div class="input-field  col s12 m2">
	
	<select id="estado_civil" name="estado_civil">	
		<option value="1" {{ isset($pessoa['estado_civil']) && $pessoa['estado_civil'] == '1' ? 'selected' : ''}}>Solteiro</option>
		<option value="2" {{ isset($pessoa['estado_civil']) && $pessoa['estado_civil'] == '2' ? 'selected' : ''}}>Casado</option>	
		<option value="3" {{ isset($pessoa['estado_civil']) && $pessoa['estado_civil'] == '3' ? 'selected' : ''}}>Divórciado</option>	
		<option value="4" {{ isset($pessoa['estado_civil']) && $pessoa['estado_civil'] == '4' ? 'selected' : ''}}>Separado</option>	
		<option value="5" {{ isset($pessoa['estado_civil']) && $pessoa['estado_civil'] == '5' ? 'selected' : ''}}>União estável</option>	
	</select>
	<label for="estado_civil">Estado Civil</label>
</div>
<div class="input-field  col s12 m5">
	<select id="pais" name="pais_id" >
	@foreach($paises as $pais)
		<option value="{{$pais->id}}" {{ (isset($pessoa['pais_id']) && $pessoa['pais_id'] == $pais->id) ? 'selected' : '' }}>{{ $pais->nome }}</option>
	@endforeach
	</select>
	<label for="pais">País origem</label>
</div>
<div class="input-field  col s12 m5">
	<select id="cidade" name="cidade_id">
	@foreach($cidades as $cidade)
		<option value="{{$cidade->id}}" {{ (isset($pessoa['cidade_id']) && $pessoa['cidade_id'] == $cidade->id) ? 'selected' : '' }}>{{ $cidade->nome_municipio }}</option>
	@endforeach
	</select>
	<label for="cidade">Cidade</label>
</div>