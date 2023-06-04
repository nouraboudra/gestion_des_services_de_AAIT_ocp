<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('candidat_ecosystems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CIN')->unique();
            $table->string('Entreprise_actuelle');
            $table->string('Poste_actuellement_occupe');
            $table->string('Type_contrat');
            $table->integer('Anciennete');
            $table->integer('annees_experience');
            $table->string('Niveau_scolaire');
            $table->string('Diplôme');
            $table->string('Spécialité');
            $table->string('Organismes_de_diplôme');
            $table->string('formations');
            $table->string('Organisme_de_formation');
            $table->string('Langues');
            $table->boolean('first_time')->default(True);
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidat_ecosystems');
    }
};
