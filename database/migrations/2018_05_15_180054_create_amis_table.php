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
            $table->bigIncrements('ID_AMIS',20);
            $table->bigInteger('ID_CANDIDAT',20);
            $table->string('PSEUDO_AMIS',128);
            $table->string('NUM_AMIS',24);
            //les indexes
            $table->unique(['ID_CANDIDAT','PSEUDO_AMIS']);
            $table->unique(['ID_CANDIDAT','PSEUDO_AMIS','NUM_AMIS']);
            $table->foreign('ID_CANDIDAT')->references('ID_CANDIDAT')->on('candidat');

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
        Schema::dropIfExists('amis');
    }
}
