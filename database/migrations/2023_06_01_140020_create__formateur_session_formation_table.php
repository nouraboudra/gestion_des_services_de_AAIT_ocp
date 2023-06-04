<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormateurSessionFormationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_formateur_session_formation', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('formateur_id');
            $table->unsignedInteger('session_formation_id');
            
            $table->foreign('formateur_id')->references('id')->on('formateurs')->onDelete('cascade');
            $table->foreign('session_formation_id')->references('id')->on('session_formations')->onDelete('cascade');
            
           // $table->primary(['formateur_id', 'session_formation_id']);
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
        Schema::dropIfExists('_formateur_session_formation');
    }
}
