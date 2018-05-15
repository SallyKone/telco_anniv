<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prixes', function (Blueprint $table) {
            $table->bigIncrements('ID_PRIX',4);
            $table->string('LIBELLE_PRIX',128)->nullable($value = true);
            $table->string('PHOTO_PRIX',128);
            $table->string('DETAIL_PRIX',1000);
            $table->date('DATE_CANDIDAT');
            
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
        Schema::dropIfExists('prixes');
    }
}
