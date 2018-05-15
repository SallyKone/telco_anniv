<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compteurs', function (Blueprint $table) {
            $table->increments('ID');
            $table->date('DATE_SMS');
            $table->integer('SMS_TOTAL')->length(50);
            $table->integer('SMS_JOUANT')->length(50);
            $table->integer('SMS_VOTANT')->length(24);
            $table->integer('SMS_ECHOUES')->length(50);
            $table->integer('SMS_SORTANT')->length(50);
            $table->integer('SMS_TENDANCE')->length(50);
            $table->integer('SMS_INSCRIPTION')->length(50);
            $table->integer('SMS_AMIS')->length(50);
            
            
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
        Schema::dropIfExists('compteurs');
    }
}
