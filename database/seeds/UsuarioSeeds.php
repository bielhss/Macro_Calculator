<?php

use Illuminate\Database\Seeder;
use App\models\Usuario;
use Carbon\Carbon;

class UsuarioSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Usuario $registro)
    {
        $registro->create([
            'nome' => 'biel',
            'data_nascimento' => Carbon::createFromFormat('d/m/Y', '30/03/1999')->format('Y-m-d'),
            'sexo' => 'M',
            'email' => 'bbb@hotmail.com',
            'telefone_celular' => '189987123',
            'senha'=>'1234',
        ]);

        $registro->create([
            'nome' => 'edin',
            'data_nascimento' => Carbon::createFromFormat('d/m/Y', '30/03/1999')->format('Y-m-d'),
            'sexo' => 'M',
            'email' => 'bbb@hotmail.com',
            'telefone_celular' => '189987123',
            'senha'=>'1234',
        ]);

        $registro->create([
            'nome' => 'vini',
            'data_nascimento' => Carbon::createFromFormat('d/m/Y', '30/03/1999')->format('Y-m-d'),
            'sexo' => 'M',
            'email' => 'bbb@hotmail.com',
            'telefone_celular' => '189987123',
            'senha'=>'1234',
        ]);

        $registro->create([
            'nome' => 'gui',
            'data_nascimento' => Carbon::createFromFormat('d/m/Y', '30/03/1999')->format('Y-m-d'),
            'sexo' => 'M',
            'email' => 'bbb@hotmail.com',
            'telefone_celular' => '189987123',
            'senha'=>'1234',
        ]);
        $registro->create([
            'nome' => 'marcos',
            'data_nascimento' => Carbon::createFromFormat('d/m/Y', '30/03/1999')->format('Y-m-d'),
            'sexo' => 'M',
            'email' => 'bbb@hotmail.com',
            'telefone_celular' => '189987123',
            'senha'=>'1234',
        ]);

        $registro->create([
            'nome' => 'lucas',
            'data_nascimento' => Carbon::createFromFormat('d/m/Y', '30/03/1999')->format('Y-m-d'),
            'sexo' => 'M',
            'email' => 'bbb@hotmail.com',
            'telefone_celular' => '189987123',
            'senha'=>'1234',
        ]);

        $registro->create([
            'nome' => 'wagnin',
            'data_nascimento' => Carbon::createFromFormat('d/m/Y', '30/03/1999')->format('Y-m-d'),
            'sexo' => 'M',
            'email' => 'bbb@hotmail.com',
            'telefone_celular' => '189987123',
            'senha'=>'1234',
        ]);
        
        $registro->create([
            'nome' => 'bruno',
            'data_nascimento' => Carbon::createFromFormat('d/m/Y', '30/03/1999')->format('Y-m-d'),
            'sexo' => 'M',
            'email' => 'bbb@hotmail.com',
            'telefone_celular' => '189987123',
            'senha'=>'1234',
        ]);
    }
}
