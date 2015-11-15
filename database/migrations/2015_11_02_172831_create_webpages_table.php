<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebpagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('webpages', function (Blueprint $table) {
			$table->increments('id');
			$table->string('subdomain');
			$table->string('category');
			$table->string('subject');
			$table->string('pagetitle');
			$table->string('h1');
			$table->longText('wording');
			$table->date('published');
			$table->date('edited');
			$table->date('expires');
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
		Schema::drop('webpages');
	}

}
