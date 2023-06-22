<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationThemeTable extends Migration
{
   
    public function up()
    {
        Schema::create('formation_theme', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('formation_id');
            $table->unsignedInteger('theme_id');
            
            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade');
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');
            
           // $table->primary(['plan_formation_id', 'theme_id']);
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('_plan_formation_theme');
    }
}
