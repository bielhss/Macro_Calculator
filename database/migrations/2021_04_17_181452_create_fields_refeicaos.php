<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsRefeicaos extends Migration
{

    public function up()
    {
        Schema::table('refeicaos', function (Blueprint $table) {
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->integer('alimento_id')->unsigned();
            $table->foreign('alimento_id')->references('id')->on('alimentos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fields_refeicaos');
    }
}
