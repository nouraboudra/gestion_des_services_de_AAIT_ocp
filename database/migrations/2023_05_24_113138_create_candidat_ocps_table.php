<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('candidat_ocps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Code_Emploi')->nullable();
            $table->string('Matricule')->unique();
            $table->string('Libelle_Code_Emploi')->nullable();
            $table->string('Niveau_code_Emploi')->nullable();
            $table->string('GROUPE_Professionnel')->nullable();
            $table->string('service')->nullable();
            $table->string('Direction')->nullable();
            $table->string('Societe')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidat_ocps');
    }
};
