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
            $table->string('formationable_type');
            $table->integer('formationable_id');            
            $table->unsignedInteger('plan_formation_id');
            $table->foreign('plan_formation_id')->references('id')->on('plan_formations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('formations');
    }
};
