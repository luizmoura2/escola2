<?php

use Illuminate\Database\Seeder;
use App\Pessoa;

class PessoaSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pessoa = new Pessoa();
        $pessoa->tipo_pessoa = 'Master';
        $pessoa->nome = 'Luiz Carlos';
        $pessoa->nome_mae= 'ildelita';
        $pessoa->nome_pai = 'Leuzer';
        $pessoa->sexo = 'M';
        $pessoa->cpf = '090.242.395-91';
        $pessoa->data_nascimento = '1958-09-24';
        $pessoa->estado_civil = 'Divorciado';
        $pessoa->pais_id = 76;
        $pessoa->cidade_id = 2900108;
        $pessoa->save();
    }
}
