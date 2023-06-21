<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Matricule')->unique()->nullable();
            $table->nullableMorphs('userable');
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('prenom')->nullable();
            $table->string('nom')->nullable();
            $table->date('date_naissance')->nullable();
            $table->date('date_embauche')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->boolean('status')->nullable();
            $table->rememberToken();
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
