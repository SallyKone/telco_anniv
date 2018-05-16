<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNumeroInconnuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numero_inconnu', function (Blueprint $table) {
            $table->increments('ID_NI');
            $table->bigInteger('ID_CANDIDAT')->length(20);
            $table->string('NUMERO_NI',128);
            //les indexes
            $table->unique('NUMERO_NI');
            $table->index('ID_CANDIDAT');

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
        Schema::dropIfExists('numero_inconnu');
    }
}
