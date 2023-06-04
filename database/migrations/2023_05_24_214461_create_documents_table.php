<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('type');
            $table->binary('fichier');
            $table->boolean('approuved_by_chef_domain')->default(false);
            $table->unsignedInteger('theme_id');
            $table->unsignedBigInteger('formateur_id');

            
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');
            $table->foreign('formateur_id')->references('id')->on('formateurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
