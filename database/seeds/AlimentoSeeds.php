<?php

use App\models\Alimento;
use Illuminate\Database\Seeder;

class AlimentoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Alimento $registro)
    {
        $registro->create([
            'nome' => 'arroz',
            'peso_padrao'=> 50.02,
            'carbo' => 50.01,
            'proteina' => 50.01,
            'gordura' => 100.00,
        ]); 
        $registro->create([
            'nome' => 'batata',
            'peso_padrao'=> 50.01,
            'carbo' => 50.01,
            'proteina' => 50.01,
            'gordura' => 100.00,
        ]); 
        $registro->create([
            'nome' => 'feijao',
            'peso_padrao'=> 50.01,
            'carbo' => 50.01,
            'proteina' => 50.01,
            'gordura' => 100.00,
        ]); 

        
    }
}
