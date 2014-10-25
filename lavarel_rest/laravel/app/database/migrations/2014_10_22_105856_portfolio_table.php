<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PortfolioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("portfolio",function ($table){
			$table->increments('id');
			$table->string('title',150);
			$table->longtext('description');
			$table->string('url',255);
			$table->string('img_src',255);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("portfolio");
	}

}
