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
            $table->unsignedInteger('jour')->length(2);
            $table->unsignedInteger('mois')->length(2);
            $table->unsignedInteger('annee')->length(4);
            $table->unsignedTinyInteger('anniv_cloture')->default(0)->comment("Etat de l'anniversaire");
            $table->dateTime('date_cloture');
            $table->unsignedBigInteger('id_recompense')->nullable();

            $table->timestamps();
            #Cle étrangère et colonne unique;
            $table->unique('date_anniv');
            $table->foreign('id_recompense')->references('id')->on('recompenses');
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
        Schema::dropIfExists('anniversaires');
    }
}
