<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypepiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typepieces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle')->length(255)->unique();
            $table->string('abreviation')->length(20)->unique();
            $table->text('description')->length(500)->nullable();

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
        Schema::dropIfExists('typepieces');
    }
}
