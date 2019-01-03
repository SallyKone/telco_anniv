<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codepays')->length(8)->nullable();
            $table->string('alpha2')->length(2);
            $table->string('alpha3')->length(3);
            $table->string('nom_en_gb')->length(150);
            $table->string('nom_fr_fr')->length(150);

            $table->timestamps();

            #Cle étrangère et colonne unique;
            $table->unique('codepays');
            $table->unique('alpha2');
            $table->unique('alpha3');
            
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
        Schema::dropIfExists('pays');
    }
}
