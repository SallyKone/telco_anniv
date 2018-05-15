<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidat', function (Blueprint $table) {
            $table->bigIncrements('ID_CANDIDAT');
            $table->string('CODE_CANDIDAT',64);
            $table->string('NOM_CANDIDAT',128);
            $table->string('PREN_CANDIDAT',128);
            $table->date('DATE_CANDIDAT');
            $table->string('NUM_CANDIDAT',128);
            $table->string('LOGIN_CANDIDAT',64);
            $table->string('PWD_CANDIDAT',128);
            $table->string('PHOTO',128);
            $table->integer('NBSMS_CANDIDAT')->length(4)->unsigned();

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
        Schema::dropIfExists('candidat');
    }
}
