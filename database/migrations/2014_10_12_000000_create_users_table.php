<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->tinyInteger('active', false, true, 4)->comment = '0 - Inactive 1 - Pending 2 - Awaiting Payment 3 - Paid up Member 4 - Ex-Officio';
			$table->tinyInteger('group_id', false, true, 4)->comment = 'From group table';
			$table->string('password', 80);
			$table->string('old_password');
			$table->date('dob');
			$table->string('birthplace');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('name');
			$table->string('hostreet');
			$table->string('add2');
			$table->string('add3');
			$table->string('town');
			$table->string('home_county');
			$table->string('postcode');
			$table->string('country');
			$table->string('maintel');
			$table->string('pritel');
			$table->string('email')->unique();
			$table->string('priopt');
			$table->string('donatereg');
			$table->string('pli');
			$table->string('freecouns');
			$table->string('ownpremis');
			$table->string('safety');
			$table->string('manyfree');
			$table->string('ethnicity');
			$table->string('employment');
			$table->string('web');
			$table->string('giftaid');
			$table->string('title');
			$table->string('awareness');
			$table->string('email2');
			$table->date('date_approved');
			$table->string('approved');
			$table->string('certificate');
			$table->date('certificate_sent');
			$table->date('expire');
			$table->tinyInteger('payment', false, true, 4);
			$table->date('payment_date');
			$table->tinyInteger('paypal_active', false, true, 4);
			$table->date('paypal_sub_start_date');
			$table->date('paypal_sub_cancel_date');
			$table->string('paypal_subscr_id');
			$table->string('paypal_payer_id');
			$table->string('paypal_payer_email');
			$table->tinyInteger('news', false, true, 4);
			$table->tinyInteger('jobs', false, true,4);
			$table->tinyInteger('message', false, true, 4);
			$table->tinyInteger('global message', false, true, 4);
			$table->string('email_copy');
			$table->date('last_login');
			$table->string('login_from');
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
