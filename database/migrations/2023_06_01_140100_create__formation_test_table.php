<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_formation_test', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('formation_id');
            $table->unsignedInteger('test_id');
            
            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade');
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            
           //$table->primary(['formation_id', 'test_id']);
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
        Schema::dropIfExists('_formation_test');
    }
}
