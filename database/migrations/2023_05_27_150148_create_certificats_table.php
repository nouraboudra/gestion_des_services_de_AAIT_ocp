<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatsTable extends Migration
{
    public function up()
    {
        Schema::create('certificats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->date('date_obtention');
            $table->unsignedInteger('chef_formation_id');
            $table->foreign('chef_formation_id')->references('id')->on('chef_formations');
            $table->unsignedBigInteger('candidat_id');
            $table->foreign('candidat_id')->references('id')->on('candidats');
            $table->unsignedInteger('formation_id');
            $table->foreign('formation_id')->references('id')->on('formations');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificats');
    }
}
