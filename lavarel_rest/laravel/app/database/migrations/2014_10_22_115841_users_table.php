<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {  
	        $table->increments('id');  
	        $table->string('username')->unique();  
	        $table->string('password');  
	        $table->string('name');  
	        $table->string('surname');  
	        $table->string('email')->unique();  
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
		chema::drop("users");
	}

}
