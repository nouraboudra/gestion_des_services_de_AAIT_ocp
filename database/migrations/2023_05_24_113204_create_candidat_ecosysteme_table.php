<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('candidat_ecosystemes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CIN')->unique();
            $table->string('Entreprise_actuelle')->nullable();
            $table->string('Poste_actuellement_occupe')->nullable();
            $table->string('Type_contrat')->nullable();
            $table->string('Societe')->nullable();
            $table->integer('Anciennete')->default(0);
            $table->integer('annees_experience')->default(0);
            $table->string('Niveau_scolaire')->nullable();
            $table->string('Diplôme')->nullable();            
            $table->string('Spécialité')->nullable();
            $table->string('Organismes_de_diplôme')->nullable();
            $table->string('Organisme_de_formation')->nullable();
            $table->string('Langues')->nullable();
            $table->boolean('first_time')->default(True);
            $table->boolean('agreed')->default(False);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidat_ecosystemes');
    }
};
