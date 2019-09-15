<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partners', function(Blueprint $table)
		{
			$table->bigInteger('partner_id', true)->unsigned();
			$table->unsignedInteger('partner_category_id');
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
		Schema::drop('partners');
	}

}
