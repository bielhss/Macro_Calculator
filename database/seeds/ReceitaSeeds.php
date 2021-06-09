<?php

use Illuminate\Database\Seeder;
use App\models\Receita;

class ReceitaSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Receita $registro)
    {
        $registro->create([
            'nome' => 'lasanha',
        ]);
    }
}
