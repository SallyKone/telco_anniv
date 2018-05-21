<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatJourPlus3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidat_jour_plus3', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('CODE_CANDIDAT',100);
            $table->string('NOM_CANDIDAT',100);
            $table->string('PREN_CANDIDAT',100);
            $table->string('NUMERO',100);
            $table->integer('NBSMS')->length(100);
            $table->string('PHOTO',100);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidat_jour_plus3');
    }
}
