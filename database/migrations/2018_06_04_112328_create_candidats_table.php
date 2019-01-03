<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('login')->length(35);
            $table->string('motpass')->length(255);
            $table->string('codecandidat')->length(35);
            
            $table->string('nom_inscription')->comment('Concaténation du nom et du prénom à la souscription');
            $table->string('nom')->length(50);
            $table->string('prenom')->length(205);
            $table->string('numero')->length(15)->comment('Numero de utilisé pendant l\'inscription');
            $table->string('telephone')->length(100)->nullable();
            $table->string('email')->length(255)->nullable();
            $table->text('photo')->length(500)->nullable()->comment("Chemin d'acces a la photo");
            $table->unsignedInteger('jour_naiss')->length(2);
            $table->unsignedInteger('mois_naiss')->length(2);
            $table->unsignedInteger('annee_naiss')->nullable();
            $table->boolean('genre')->nullable();
            
            $table->unsignedInteger('id_typepiece')->nullable();
            $table->unsignedInteger('id_pays')->nullable();
            $table->string('numpiece')->length(100)->nullable();
            $table->boolean('profil_complet')->default(false);

            $table->timestamps();
            #Cle étrangère et colonne unique;
            $table->unique('login');
            $table->unique('codecandidat');
            $table->foreign('id_typepiece')->references('id')->on('typepieces');
            $table->foreign('id_pays')->references('id')->on('pays');
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
        Schema::dropIfExists('candidats');
    }
}
