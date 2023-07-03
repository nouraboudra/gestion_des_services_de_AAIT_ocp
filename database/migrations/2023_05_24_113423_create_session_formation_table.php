<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up()
  {
    Schema::create('session_formations', function (Blueprint $table) {
      $table->increments('id');
      $table->string('intitule');
      $table->dateTime('date_debut');
      $table->dateTime('date_fin');

      $table->unsignedInteger('groupe_id');
      $table->unsignedInteger('salle_id');
      $table->unsignedInteger('formation_id');
      $table->unsignedBigInteger('formateur_id');

      $table->foreign('formateur_id')->references('id')->on('formateurs')->onDelete('cascade');
      $table->foreign('groupe_id')->references('id')->on('groupes')->onDelete('cascade');
      $table->foreign('salle_id')->references('id')->on('salles')->onDelete('cascade');
      $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade');


      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('session_formations');
  }
};