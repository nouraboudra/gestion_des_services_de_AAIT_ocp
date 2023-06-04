<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSousDomainsTable extends Migration
{
    public function up()
    {
        Schema::create('sous_domains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->unsignedInteger('domain_id');
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
           
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sous_domains');
    }
}
