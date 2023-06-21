<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('salles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code')->unique()->nullable();
            $table->string('intitule')->nullable();
            $table->unsignedInteger('batiment_id')->nullable();
            $table->unsignedInteger('typesalle_id')->nullable();
            // Add other necessary columns here

            $table->timestamps();

            $table->foreign('batiment_id')->references('id')->on('batiments');
            $table->foreign('typesalle_id')->references('id')->on('types_salles');
        });
    }

    public function down()
    {
        Schema::table('salles', function (Blueprint $table) {
            $table->dropForeign(['batiment']);
            $table->dropForeign(['typesalle']);
        });

        Schema::dropIfExists('salles');
    }
};
