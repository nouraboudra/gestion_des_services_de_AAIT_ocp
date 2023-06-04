<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_debut');
            $table->date('date_fin');
            // Ajoutez ici les colonnes supplémentaires nécessaires
            $table->unsignedInteger('salle_id');
            $table->foreign('salle_id')->references('id')->on('salles')->onDelete('cascade');

            $table->unsignedInteger('responsable_logistique_id');
            $table->foreign('responsable_logistique_id')->references('id')->on('responsable_logistiques')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
