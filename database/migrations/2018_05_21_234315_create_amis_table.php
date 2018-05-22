<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->length(255);
            $table->unsignedInteger('numero')->length(8);
            $table->unsignedBigInteger('id_candidat');

            $table->timestamps();
            #Cle étrangère
            $table->foreign('id_candidat')->references('id')->on('candidats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amis');
    }
}
