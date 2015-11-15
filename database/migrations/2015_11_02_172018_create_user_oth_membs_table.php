<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserOthMembsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_oth_membs', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id', false, true, 10)->comment = 'Member/User number';
			$table->string('oth_memb');
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
		Schema::drop('user_oth_membs');
	}

}
