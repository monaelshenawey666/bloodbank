<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('phone');
			$table->string('email');
			$table->string('password', 255);
			$table->string('name');
			$table->date('date_of_birth');
			$table->integer('blood_type_id')->unsigned();
			$table->enum('blood_type',array('O','O+','A+','A-','B+','B-','AB+','AB-'));
			$table->date('last_donation_date');
			$table->integer('city_id')->unsigned();

			$table->string('api_token',90)->unique()->nullable();
			$table->string('pin_code')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}