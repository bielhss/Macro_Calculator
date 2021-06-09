<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlimentosTable extends Migration
{
   
    public function up()
    {
        Schema::create('alimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100);
            $table->float ('peso_padrao', 8,2);
            $table->float ('carbo', 8,2);
            $table->float ('proteina', 8,2);
            $table->float ('gordura', 8,2);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('alimentos');
    }
}
