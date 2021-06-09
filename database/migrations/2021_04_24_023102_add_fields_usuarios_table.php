<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsUsuariosTable extends Migration
{
  
    public function up()
    {
        Schema::table('usuarios', function(Blueprint $table){

            $table->string('profile_pic')->nullable();
            $table->boolean('is_active')->default(0);
        });
    }


    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
