<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsuarioSeeds::class);
         $this->call(ReceitaSeeds::class);
         $this->call(AlimentoSeeds::class);
    }
}
