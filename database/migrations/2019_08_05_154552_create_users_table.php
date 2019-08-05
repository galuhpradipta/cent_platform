<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('password');
			$table->string('unencrypted_password')->nullable();
			$table->string('email')->unique();
			$table->dateTime('email_verified_at')->nullable();
			$table->string('name')->nullable();
			$table->string('phone_number')->nullable();
			$table->string('address')->nullable();
			$table->integer('business_id')->unsigned();
			$table->integer('role')->unsigned()->default(4);
			$table->integer('registered_by')->unsigned()->default(0);
			$table->string('remember_token', 100)->nullable();
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
