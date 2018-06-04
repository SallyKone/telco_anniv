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
            $table->string('codepays');
            $table->string('nompays');
            $table->string('codepostal');
            $table->unsignedInteger('id_langue');

            $table->timestamp('created_at');
            $table->timestamp('updated_at');

            #Cle étrangère et colonne unique;
            $table->unique('codepays');
            $table->unique('nompays');
            $table->foreign('id_langue')->references('id')->on('langues');
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
