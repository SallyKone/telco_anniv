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
            $table->string('motpass')->length(35);
            $table->string('codecandidat')->length(35);
            
            $table->string('nom_inscription')->comment('Concaténation du nom et du prénom à la souscription');
            $table->string('nom')->length(50);
            $table->string('prenom')->length(205);
            $table->unsignedInteger('numero')->length(8)->comment('Numero unique associé à un compte');
            $table->string('telephone')->length(100)->nullable();
            $table->string('email')->length(255)->nullable();
            $table->text('photo')->length(500)->nullable()->comment("Chemin d'acces a la photo");
            $table->unsignedInteger('jour_naiss');
            $table->unsignedInteger('mois_naiss');
            $table->unsignedInteger('annee_naiss')->nullable();
            
            $table->unsignedInteger('id_typepiece')->nullable();
            $table->string('numpiece')->length(100)->nullable();
            $table->boolean('profil_complet')->default(false);

            $table->timestamps();
            #Cle étrangère et colonne unique;
            $table->unique('login');
            $table->unique('numero');
             $table->unique('codecandidat');
            $table->foreign('id_typepiece')->references('id')->on('typepieces');
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
