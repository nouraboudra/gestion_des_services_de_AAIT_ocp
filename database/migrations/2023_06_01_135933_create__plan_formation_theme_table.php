<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanFormationThemeTable extends Migration
{
   
    public function up()
    {
        Schema::create('_plan_formation_theme', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('plan_formation_id');
            $table->unsignedInteger('theme_id');
            
            $table->foreign('plan_formation_id')->references('id')->on('plan_formations')->onDelete('cascade');
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
