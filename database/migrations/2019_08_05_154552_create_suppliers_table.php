<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuppliersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('suppliers', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name');
			$table->string('email');
			$table->string('address');
			$table->string('phone_number');
			$table->integer('company_id')->unsigned();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('suppliers');
	}

}
