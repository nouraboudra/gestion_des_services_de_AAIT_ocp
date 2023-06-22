<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Intitulé');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->unsignedBigInteger('planificateur_id');
            $table->nullableMorphs('formationable');
            $table->foreign('planificateur_id')->references('id')->on('planificateurs')->unsigned()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('formations');
    }
};
