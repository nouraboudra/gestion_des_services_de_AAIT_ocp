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
            $table->integer('Code_Emploi');
            $table->string('Libelle_Code_Emploi');
            $table->string('Niveau_code_Emploi');
            $table->string('GROUPE_Professionnel');
            $table->string('service');
            $table->string('Direction');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidat_ocps');
    }
};
