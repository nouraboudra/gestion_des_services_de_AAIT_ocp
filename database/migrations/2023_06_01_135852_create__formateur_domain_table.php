<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormateurDomainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_formateur_domain', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('formateur_id');
            $table->unsignedInteger('domain_id');
            
            $table->foreign('formateur_id')->references('id')->on('formateurs')->onDelete('cascade');
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
            
            //$table->primary(['formateur_id', 'domain_id']);

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
        Schema::dropIfExists('_formateur_domain');
    }
}
