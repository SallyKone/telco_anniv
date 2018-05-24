<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login')->length(15);
            $table->string('motpass')->length(25);
            $table->string('nom')->length(50);
            $table->string('prenom')->length(205);
            $table->string('telephone')->length(100);
            $table->text('photo')->length(500)->nullable();
            $table->unsignedInteger('id_typeuser');

            $table->timestamps();
            #Cle étrangère et colonne unique;
            $table->unique('login');
            $table->foreign('id_typeuser')->references('id')->on('typeusers');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
}
