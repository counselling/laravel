<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChangedResidencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('changed_residences', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('user_id', false, true, 10)->comment = 'Member/User number';
			$table->string('hostreet')->comment = 'House number/Street';
			$table->string('add2');
			$table->string('add3');
			$table->string('town');
			$table->string('postcode',10);
			$table->string('home_county');
			$table->string('country');
			$table->string('status');
			$table->string('email');
			$table->date('change_date');
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
		Schema::drop('changed_residences');
	}

}
