<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('log');
			$table->integer('referral', false, true, 10);
			$table->string('benefits');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('nino');
			$table->string('address1');
			$table->string('address2');
			$table->string('address3');
			$table->string('town');
			$table->string('county');
			$table->string('outcode');
			$table->string('incode');
			$table->string('email');
			$table->string('reason1');
			$table->string('reason2');
			$table->string('reason3');
			$table->text('notes');
			$table->string('age');
			$table->string('ethnic');
			$table->string('family');
			$table->string('children');
			$table->string('employment');
			$table->string('abilitysick');
			$table->string('pay');
			$table->string('distance');
			$table->string('req1');
			$table->string('req2');
			$table->string('req3');
			$table->string('req4');
			$table->string('rep1');
			$table->string('rep2');
			$table->string('rep3');
			$table->string('rep4');
			$table->string('erep1');
			$table->string('erep2');
			$table->string('erep3');
			$table->string('erep4');
			$table->string('fwd1');
			$table->string('fwd2');
			$table->string('fwd3');
			$table->string('fwd4');
			$table->string('status');
			$table->string('closed');
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
		Schema::drop('clients');
	}

}
