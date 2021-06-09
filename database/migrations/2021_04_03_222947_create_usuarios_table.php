<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{

    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100);
            $table->date('data_nascimento',20);
            $table->string('sexo',1);
            $table->string('email',100);
            $table->string('telefone_celular',20);
            $table->string('senha',20);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
