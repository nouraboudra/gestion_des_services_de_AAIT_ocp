<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionBanqueQuestionTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('question_banque_question', function (Blueprint $table) {
      $table->id();

      $table->unsignedBigInteger('question_id');
      $table->unsignedBigInteger('banque_question_id');

      $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
      $table->foreign('banque_question_id')->references('id')->on('banque_questions')->onDelete('cascade');

      //$table->primary(['question_id', 'banque_question_id']);
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
    Schema::dropIfExists('_question_banque_question');
  }
}