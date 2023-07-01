<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatGroupeTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('candidat_groupe', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('candidat_id');
      $table->unsignedInteger('groupe_id');

      $table->foreign('candidat_id')->references('id')->on('candidats')->onDelete('cascade');
      $table->foreign('groupe_id')->references('id')->on('groupes')->onDelete('cascade');


      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('_candidat_groupe');
  }
}
