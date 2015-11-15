<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounts', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->date('date');
			$table->string('type')->comment = 'Registration, Newsletter etc';
			$table->decimal('credit', 6, 2);
			$table->decimal('debit', 6, 2);
			$table->integer('trans_rcpt', false, true, 10);
			$table->integer('user_id')->unsigned()->comment = 'Member/User number';
			$table->longText('comments');
			$table->string('cash_cheque', 25)->comment = 'Cash, Cheque, Paypal etc';
			$table->string('assign_fund');
			$table->dateTime('start_date');
			$table->dateTime('end_date');
			$table->integer('trans_active', false, true, 2);
			$table->string('paypal_txn_id', 50);
			$table->string('paypal_subscr_id', 25);
			$table->string('paypal_payer_id', 25);
			$table->string('paypal_payer_email');
			$table->timestamps();
		});

		Schema::table('accounts', function($table) {
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('accounts');
	}

}
