<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('testable'); // This will create 'testable_id' and 'testable_type' columns

            $table->unsignedInteger('theme_id');
            $table->unsignedBigInteger('banque_question_id');
            $table->unsignedBigInteger('formateur_id');

            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');
            $table->foreign('banque_question_id')->references('id')->on('banque_questions')->onDelete('cascade');
            $table->foreign('formateur_id')->references('id')->on('formateurs')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
