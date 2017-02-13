<div class="input-field">
	<input type="hidden" name="id" value="{{ isset($registro['id']) ? $registro['id'] : '' }}">
</div>
<div class="input-field col s12 m12">
	<input id="tipo" type="text" name="nome" maxlength="100" value="{{ isset($registro['nome']) ? $registro['nome'] : '' }}">
	<label for="tipo">Nome</label>
</div>
<div class="input-field col s12 m12">
	<input class="validate" type="text" name="descricao" maxlength="100" value="{{ isset($registro['descricao']) ? $registro['descricao'] : '' }}"/>
	<label>Descrição</label>
</div>