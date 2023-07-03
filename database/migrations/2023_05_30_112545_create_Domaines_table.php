<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDomainesTable extends Migration
{

	public function up()
	{
		Schema::create('Domaines', function (Blueprint $table) {
			$table->id();
			$table->string('Name');
			$table->string('Responsable');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('Domaines');
	}
}
