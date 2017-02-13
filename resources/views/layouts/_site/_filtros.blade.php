<div class="row">
	<form action="{{ route('site.busca') }}">
		<div class="input-field col s4 m3">
			<select  name="status">
			<option value="todos">Aluguel e Venda</option>
				<option {{ (isset($busca['status']) && $busca['status'] == 'aluga') ? 'selected' : ''}} value="aluga">Aluguel</option>
				<option {{ (isset($busca['status']) && $busca['status'] == 'vende') ? 'selected' : ''}} value="vende">Venda</option>			
			</select>
			<label>Status</label>
		</div>
		<div class="input-field col s8 m4">
			<select name="tipo_id">
				<option value="todos">Todos os tipos</option>
			@foreach($tipos as $tipo)
				<option value="{{$tipo->id}}" {{ isset( $busca['tipo_id'] ) && $busca['tipo_id'] == $tipo->id ? 'selected' : ''}} >{{ $tipo->titulo }}</option>
			@endforeach				
			</select>
			<label>Tipo de Imóvel</label>
		</div>
		<div class="input-field col s9 m4">
			<select name="cidade_id">
				<option value="todos">Todas as cidades</option>
			@foreach($cidades as $cidade)
				<option {{ isset($busca['cidade_id']) && $busca['cidade_id'] == $cidade->id ? 'selected' : ''}} value="{{$cidade->id}}">{{$cidade->nome_municipio}}</option>
			@endforeach			
			</select>
			<label>Cidade</label>
		</div>
		<div class="input-field col s3 m1">
			<select name="dormitorio">
				<option {{$campo['dormitorio'][0]}} value="0">Todos</option>
				<option {{$campo['dormitorio'][1]}} value="1">1</option>
				<option {{$campo['dormitorio'][2]}} value="2">2</option>
				<option {{$campo['dormitorio'][3]}} value="3">3</option>
				<option {{$campo['dormitorio'][4]}} value="4">Mais...</option>				
			</select>
			<label>Dormitórios</label>
		</div>
		<div class="input-field col s12 m5">
			<select name="valor">
				<option {{$campo['valor'][0]}} value="0">Todos os valores</option>
				<option {{$campo['valor'][1]}} value="1">Até R$ 500,00</option>
				<option {{$campo['valor'][2]}} value="2">R$ 500,00 a 1.000,00</option>
				<option {{$campo['valor'][3]}} value="3">R$ 1.000,00 a 5.000,00</option>
				<option {{$campo['valor'][4]}} value="4">R$ 5.000,00 a 10.000,00</option>
				<option {{$campo['valor'][5]}} value="5">R$ 10.000,00 a 50.000,00</option>
				<option {{$campo['valor'][6]}} value="6">R$ 50.000,00 a 100.000,00</option>
				<option {{$campo['valor'][7]}} value="7">R$ 100.000,00 a 200.000,00</option>
				<option {{$campo['valor'][8]}} value="8">R$ 200.000,00 a 300.000,00</option>
				<option {{$campo['valor'][9]}} value="9">R$ 300.000,00 a 500.000,00</option>
				<option {{$campo['valor'][9]}} value="10">R$ 500.000,00 a 1.000.000,00</option>
				<option {{$campo['valor'][10]}} value="11">Mais...</option>				
			</select>
			<label>Valor médio</label>			
		</div>
		<div class="input-field col s12 m5">
			<input type="text" class="validade" name="bairro" value="{{ isset($busca['bairro']) ? $busca['bairro'] : ''}}">
			<label>Bairro</label>			
		</div>
		<div class="input-field col s1 m2">
			<button class="btn teal right">Filtrar</button>
		</div>
	</form>
</div>