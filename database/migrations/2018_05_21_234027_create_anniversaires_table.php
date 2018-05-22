<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnniversairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anniversaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle')->length(255);
            $table->date('date_anniv')->comment("Date de l'anniversaire");
            $table->unsignedInteger('annee')->length(4);
            $table->boolean('anniv_cloture')->comment("Etat de l'anniversaire");
            $table->date('date_cloture')->nullable();
            $table->unsignedBigInteger('id_candidat')->nullable();
            $table->unsignedInteger('id_recompense')->nullable();

            $table->timestamps();
            #Cle étrangère et colonne unique;
            $table->unique('date_anniv');
            $table->foreign('id_candidat')->references('id')->on('candidats');
            $table->foreign('id_recompense')->references('id')->on('recompenses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anniversaires');
    }
}
