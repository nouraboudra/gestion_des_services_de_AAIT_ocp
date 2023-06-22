<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fiche_satisfactions', function (Blueprint $table) {
            $table->increments('id');
            // Ajoutez ici les colonnes nécessaires pour la fiche de satisfaction

            // Relation avec la table plan_formation
            $table->unsignedInteger('formation_id');
            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade');


            $table->unsignedBigInteger('formateur_id');
            $table->foreign('formateur_id')->references('id')->on('formateurs')->onDelete('cascade');
            

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fiche_satisfactions');
    }
};
