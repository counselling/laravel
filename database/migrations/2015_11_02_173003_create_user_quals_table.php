<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserQualsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_quals', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('user_id')->unsigned()->comment = 'Member/User number';
			$table->string('qual_level');
			$table->string('qual_subject');
			$table->string('qual_college');
			$table->string('qual_town');
			$table->string('qual_county');
			$table->string('qual_start');
			$table->string('qual_end');
			$table->string('qual_status');
			$table->tinyInteger('qual_approved', false, true, 4)->comment = '1:Approved 2:Pending 3:Declined 4:Deleted by member';
			$table->string('qual_email');
			$table->string('qual_telephone');
			$table->string('qual_website');
			$table->string('qual_accreditation');
			$table->string('qual_method');
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
		Schema::drop('user_quals');
	}

}
