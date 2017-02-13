<div class="input-field">
	<input type="hidden" name="id" value="{{ isset($usuario['id']) ? $usuario['id'] : '' }}">
</div>
<div class="input-field">
	<input type="hidden" name="pessoa_id" value="{{ isset($pessoa['id']) ? $pessoa['id'] : '' }}">
</div>
<div class="input-field col s12 m5">
	<input class="validade" type="text" name="name"  value="{{ isset($usuario['name']) ? $usuario['name'] : '' }}"/>
	<label>User Name</label>
</div>
<div class="input-field col s12 m2">
	<input class="validade" type="text" name="perfil_sis" value="{{ isset($usuario['perfil_sis']) ? $usuario['perfil_sis'] : '' }}"></input>
	<label>Perfil</label>
</div>
<div class="input-field col s12 m2">
	<input class="validade" type="text" name="cargo" value="{{ isset($usuario['cargo']) ? $usuario['cargo'] : '' }}"></input>
	<label>Cargo</label>
</div>
<div class="input-field col s12 m3">
	<input class="validade" type="text" name="orgao" value="{{ isset($usuario['orgao']) ? $usuario['orgao'] : '' }}"></input>
	<label>Orgao</label>
</div>
<div class="input-field  col s12 m4">
	<input id="email" name="email" type="email" class="validate" value="{{ isset($usuario['email']) ? $usuario['email'] : '' }}">
    <label for="email" data-error="wrong" data-success="right">Email</label>
</div>
<div class="input-field  col s12 m3">
	<input class="validade" type="password" name="password"></input>
	<label>Password</label>
</div>
<div class="input-field  col s12 m5">
	<select name="posto_id">
	@foreach($postos as $posto)
		<option value="{{$posto->id}}" {{ isset($usuario['posto_id']) && $usuario['posto_id'] == $posto->id ? 'selected' : ''}} >{{ $posto->nome }}</option>
	@endforeach
	</select>
	<label>Posto</label>
</div>