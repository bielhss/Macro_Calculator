<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefeicaosTable extends Migration
{

    public function up()
    {
        Schema::create('refeicaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100);
            $table->float ('peso', 8,2);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('refeicaos');
    }
}
