<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientablesTable extends Migration {

	public function up()
	{
		Schema::create('clientables', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('client_id', 11);
			$table->string('clientable_type', 255);
			$table->string('clientable_id', 11);
			$table->boolean('is_read');
		});
	}

	public function down()
	{
		Schema::drop('clientables');
	}
}