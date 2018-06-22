<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_candidat');
            $table->unsignedBigInteger('id_anniversaire');
            $table->string('numeroVotant')->length(15);

            $table->timestamps();
            
            #Cle étrangère
            $table->foreign('id_candidat')->references('id')->on('candidats');
            $table->foreign('id_anniversaire')->references('id')->on('anniversaires');
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
        Schema::dropIfExists('votes');
    }
}
