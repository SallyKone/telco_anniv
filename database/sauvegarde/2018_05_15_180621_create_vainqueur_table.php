<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVainqueurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vainqueur', function (Blueprint $table) {
            $table->bigIncrements('ID_VAINQ');
            $table->string('ID_PRIX')->length(20);
            $table->bigInteger('ID_CANDIDAT')->length(20);
            $table->date('DATE_VAINQ');
            $table->integer('NB_SMS');
            //les indexes
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
        Schema::dropIfExists('vainqueur');
    }
}
