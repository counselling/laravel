<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempPracticesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('temp_practices', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('user_id', false, true, 10)->comment = 'Member/User number';
			$table->string('temp_hostreet');
			$table->string('temp_add2');
			$table->string('temp_add3');
			$table->string('temp_town');
			$table->string('temp_county');
			$table->string('temp_postcode');
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
		Schema::drop('temp_practices');
	}

}
