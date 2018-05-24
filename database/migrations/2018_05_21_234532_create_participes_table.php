<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participes', function (Blueprint $table) { 
            $table->unsignedBigInteger('id_candidat');
            $table->unsignedBigInteger('id_anniversaire');
            $table->unsignedInteger('annee')->length(4);
            $table->unsignedTinyInteger('gagne')->default(0);

            $table->timestamps();
            #Cle étrangère
            $table->foreign('id_candidat')->references('id')->on('candidats');
            $table->foreign('id_anniversaire')->references('id')->on('anniversaires');
            $table->primary(['id_candidat','annee']);
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
        Schema::dropIfExists('participes');
    }
}
